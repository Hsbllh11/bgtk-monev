@extends('layouts.app')

@section('title', 'Pengisian Instrumen BCKS')

@section('page-title', 'Pengisian Instrumen BCKS')

@section('content')

    @php
        $levels = config('bcks.instrumen.levels', []);
        $pertanyaanTerbuka = config('bcks.instrumen.pertanyaan_terbuka', []);
    @endphp

    <div class="space-y-6">

    {{-- =========================================================
        HEADER HALAMAN
        ========================================================== --}}

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Instrumen Monev BCKS
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Formulir Monitoring dan Evaluasi BCKS.
                </p>

            </div>

            <a href="{{ route('instrumen.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Kembali
            </a>

        </div>

        {{-- =========================================================
        INFORMASI INSTRUMEN & PROGRESS
        ========================================================== --}}

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1fr)_280px]">

                {{-- =================================================
                INFORMASI INSTRUMEN
                ================================================== --}}

                <div class="border-l-4 border-blue-600 p-5 sm:p-6">

                    <div class="flex items-start gap-3">

                        {{-- ICON --}}

                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>

                        {{-- JUDUL & DESKRIPSI --}}

                        <div class="min-w-0">

                            <h2 class="text-lg font-bold text-slate-900">
                                Instrumen Monitoring dan Evaluasi BCKS
                            </h2>

                            <p class="mt-1 text-sm leading-6 text-slate-600">
                                Instrumen ini digunakan untuk mengevaluasi efektivitas
                                pelatihan dan dampak penerapan kompetensi
                                Bakal Calon Kepala Sekolah (BCKS).
                            </p>

                        </div>

                    </div>




                    {{-- =================================================
                    PETUNJUK
                    ================================================== --}}

                    <div class="mt-5 rounded-xl border border-dashed border-blue-200 bg-blue-50/50 px-4 py-3">

                        <div class="flex items-start gap-2.5">

                            <svg xmlns="http://www.w3.org/2000/svg" class="mt-0.5 h-4 w-4 shrink-0 text-blue-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>

                            <div class="min-w-0 text-xs leading-5 text-slate-600">

                                <p class="font-semibold text-blue-700">
                                    Petunjuk pengisian
                                </p>

                                <p class="mt-0.5">
                                    Bacalah setiap indikator dan rubrik penilaian,
                                    kemudian tentukan skor
                                    <strong>1, 2, 3, atau 4</strong>
                                    sesuai dengan kondisi riil di lapangan.
                                    Pastikan seluruh 27 butir penilaian telah diisi.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                PROGRESS PENGISIAN
                ================================================== --}}

                <div class="border-t border-slate-200 bg-slate-50/70 p-5 sm:p-6 lg:border-l lg:border-t-0">

                    <div class="flex items-center justify-between">

                        <span class="text-xs font-semibold text-slate-500">
                            Progres pengisian
                        </span>

                        <span id="bcks-progress-percent" class="text-xs font-bold text-blue-600">
                            0%
                        </span>

                    </div>


                    {{-- PROGRESS BAR --}}

                    <div class="mt-2 h-2 overflow-hidden rounded-full bg-slate-200">

                        <div id="bcks-progress-bar" class="h-full rounded-full bg-blue-600 transition-all duration-300"
                            style="width: 0%"></div>

                    </div>


                    {{-- JUMLAH BUTIR --}}

                    <div class="mt-2 flex items-center justify-between">

                        <span id="bcks-progress-text" class="text-sm font-bold text-slate-900">
                            0 / 27 butir
                        </span>

                        <span class="text-xs text-slate-400">
                            Penilaian
                        </span>

                    </div>


                    {{-- SKOR SEMENTARA --}}

                    <div class="mt-5 border-t border-slate-200 pt-4">

                        <p class="text-xs font-medium text-slate-500">
                            Skor sementara
                        </p>

                        <p id="bcks-score-text" class="mt-1 text-sm font-bold text-slate-900">
                            Belum ada penilaian
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
        VALIDATION ERROR
        ========================================================== --}}

        @if ($errors->any())

            <div class="rounded-xl border border-red-200 bg-red-50 px-5 py-4">

                <p class="text-sm font-bold text-red-800">
                    Terdapat kesalahan pada pengisian:
                </p>

                <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-700">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- =========================================================
        FORM UTAMA
        ========================================================== --}}

        <form action="{{ route('bcks.store') }}" method="POST" class="space-y-6">

            @csrf


            {{-- =====================================================
            A. IDENTITAS BCKS
            ====================================================== --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 bg-slate-50 px-6 py-4">

                    <h2 class="text-lg font-bold text-slate-800">
                        A. Identitas BCKS
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Lengkapi informasi mengenai BCKS yang dievaluasi.
                    </p>

                </div>


                <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-2">

                    {{-- Nama BCKS --}}

                    <div>

                        <label for="nama_bcks" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nama BCKS
                            <span class="text-red-500">*</span>
                        </label>

                        <input type="text" id="nama_bcks" name="nama_bcks" value="{{ old('nama_bcks') }}" required
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>


                    {{-- Unit Kerja --}}

                    <div>

                        <label for="unit_kerja" class="mb-2 block text-sm font-semibold text-slate-700">
                            Unit Kerja
                        </label>

                        <input type="text" id="unit_kerja" name="unit_kerja" value="{{ old('unit_kerja') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>


                    {{-- Angkatan --}}

                    <div class="md:col-span-2">

                        <label for="angkatan_pelatihan" class="mb-2 block text-sm font-semibold text-slate-700">
                            Angkatan Pelatihan BCKS
                        </label>

                        <input type="text" id="angkatan_pelatihan" name="angkatan_pelatihan"
                            value="{{ old('angkatan_pelatihan') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                </div>

            </div>


            {{-- =====================================================
            B. IDENTITAS RESPONDEN
            ====================================================== --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 bg-slate-50 px-6 py-4">

                    <h2 class="text-lg font-bold text-slate-800">
                        B. Identitas Responden
                    </h2>

                </div>


                <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-2">

                    {{-- Nama Responden --}}

                    <div>

                        <label for="nama_responden" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nama Responden
                            <span class="text-red-500">*</span>
                        </label>

                        <input type="text" id="nama_responden" name="nama_responden" value="{{ old('nama_responden') }}"
                            required
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>


                    {{-- Unit Kerja Responden --}}

                    <div>

                        <label for="unit_kerja_responden" class="mb-2 block text-sm font-semibold text-slate-700">
                            Unit Kerja Responden
                        </label>

                        <input type="text" id="unit_kerja_responden" name="unit_kerja_responden"
                            value="{{ old('unit_kerja_responden') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>


                    {{-- Status Responden --}}

                    <div class="md:col-span-2">

                        <label for="status_responden" class="mb-2 block text-sm font-semibold text-slate-700">
                            Status Responden
                            <span class="text-red-500">*</span>
                        </label>

                        <select id="status_responden" name="status_responden" required
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                            <option value="">
                                Pilih status responden
                            </option>

                            <option value="BCKS" @selected(old('status_responden') === 'BCKS')>
                                BCKS
                            </option>

                            <option value="Atasan Langsung / Pengawas Sekolah" @selected(old('status_responden') === 'Atasan Langsung / Pengawas Sekolah')>
                                Atasan Langsung / Pengawas Sekolah
                            </option>

                            <option value="Perwakilan Guru / Tenaga Kependidikan"
                                @selected(old('status_responden') === 'Perwakilan Guru / Tenaga Kependidikan')>
                                Perwakilan Guru / Tenaga Kependidikan
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            {{-- =====================================================
            C. PETUGAS MONEV
            ====================================================== --}}

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 bg-slate-50 px-6 py-4">

                    <h2 class="text-lg font-bold text-slate-800">
                        C. Petugas Monev
                    </h2>

                </div>


                <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-2">

                    {{-- Nama Petugas --}}

                    <div>

                        <label for="nama_petugas_monev" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nama Petugas Monev
                            <span class="text-red-500">*</span>
                        </label>

                        <input type="text" id="nama_petugas_monev" name="nama_petugas_monev"
                            value="{{ old('nama_petugas_monev') }}" required
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>


                    {{-- Unit Kerja Petugas --}}

                    <div>

                        <label for="unit_kerja_petugas" class="mb-2 block text-sm font-semibold text-slate-700">
                            Unit Kerja Petugas
                        </label>

                        <input type="text" id="unit_kerja_petugas" name="unit_kerja_petugas"
                            value="{{ old('unit_kerja_petugas') }}"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>


                    {{-- Tanggal Evaluasi --}}

                    <div>

                        <label for="tanggal_evaluasi" class="mb-2 block text-sm font-semibold text-slate-700">
                            Tanggal Evaluasi
                            <span class="text-red-500">*</span>
                        </label>

                        <input type="date" id="tanggal_evaluasi" name="tanggal_evaluasi"
                            value="{{ old('tanggal_evaluasi', date('Y-m-d')) }}" required
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    </div>

                </div>

            </div>


            {{-- =====================================================
            D. PENILAIAN
            ====================================================== --}}

            <div class="space-y-6">

                @foreach ($levels as $levelKey => $level)

                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        {{-- HEADER LEVEL --}}

                        <div class="border-b border-slate-200 bg-slate-50 px-6 py-4">

                            <h2 class="text-lg font-bold text-slate-800">
                                {{ $level['label'] }}
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Pilih satu skor untuk setiap indikator.
                            </p>

                        </div>


                        {{-- TABLE --}}

                        <div class="overflow-x-auto">

                            <table class="w-full min-w-[900px] border-collapse">

                                <thead>

                                    <tr class="bg-slate-100">

                                        <th
                                            class="w-20 border-b border-slate-200 px-4 py-3 text-center text-xs font-bold uppercase tracking-wide text-slate-500">
                                            No
                                        </th>

                                        <th
                                            class="border-b border-slate-200 px-5 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">
                                            Pertanyaan / Indikator
                                        </th>

                                        @for ($nilai = 1; $nilai <= 4; $nilai++)

                                            <th
                                                class="w-20 border-b border-slate-200 px-3 py-3 text-center text-xs font-bold text-slate-500">
                                                {{ $nilai }}
                                            </th>

                                        @endfor

                                    </tr>

                                </thead>


                                <tbody class="divide-y divide-slate-100">

                                    @foreach ($level['indikator'] as $indikator)

                                        @php
                                            $kodeForm = str_replace('.', '_', $indikator['kode']);
                                        @endphp

                                        <tr class="transition hover:bg-slate-50">

                                            <td class="px-4 py-4 text-center text-sm font-semibold text-slate-600">
                                                {{ $indikator['kode'] }}
                                            </td>


                                            <td class="px-5 py-4 text-sm leading-6 text-slate-700">
                                                {{ $indikator['pertanyaan'] }}
                                            </td>


                                            @for ($nilai = 1; $nilai <= 4; $nilai++)

                                                <td class="px-3 py-4 text-center">

                                                    <label class="inline-flex cursor-pointer items-center justify-center">

                                                        <input type="radio" name="skor[{{ $kodeForm }}]" value="{{ $nilai }}"
                                                            @checked(old('skor.' . $kodeForm) == $nilai)
                                                            class="h-5 w-5 border-slate-300 text-blue-600 focus:ring-2 focus:ring-blue-200">

                                                    </label>

                                                </td>

                                            @endfor

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    </div>

                @endforeach

            </div>

            {{-- =====================================================
            BUTTON
            ====================================================== --}}

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a href="{{ route('bcks.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Batal
                </a>

                <button type="submit"
                    class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                    Simpan Pengisian
                </button>

            </div>

        </form>

    </div>


    {{-- =========================================================
    JAVASCRIPT PROGRESS
    ========================================================== --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const totalIndikator = 27;

            const progressBar =
                document.getElementById('bcks-progress-bar');

            const progressPercent =
                document.getElementById('bcks-progress-percent');

            const progressText =
                document.getElementById('bcks-progress-text');

            const scoreText =
                document.getElementById('bcks-score-text');


            function updateBcksProgress() {

                const checked = document.querySelectorAll(
                    'input[type="radio"][name^="skor["]:checked'
                );


                const jumlahDiisi = checked.length;

                let totalSkor = 0;


                checked.forEach(function (radio) {

                    totalSkor += Number(radio.value);

                });


                const persen = Math.round(
                    (jumlahDiisi / totalIndikator) * 100
                );


                if (progressBar) {

                    progressBar.style.width =
                        persen + '%';

                }


                if (progressPercent) {

                    progressPercent.textContent =
                        persen + '%';

                }


                if (progressText) {

                    progressText.textContent =
                        jumlahDiisi +
                        ' / ' +
                        totalIndikator +
                        ' butir';

                }


                if (scoreText) {

                    if (jumlahDiisi === 0) {

                        scoreText.textContent =
                            'Belum ada penilaian';

                    } else {

                        scoreText.textContent =
                            totalSkor +
                            ' / ' +
                            (totalIndikator * 4) +
                            ' poin';

                    }

                }

            }


            document
                .querySelectorAll(
                    'input[type="radio"][name^="skor["]'
                )
                .forEach(function (radio) {

                    radio.addEventListener(
                        'change',
                        updateBcksProgress
                    );

                });


            updateBcksProgress();

        });

    </script>

@endsection