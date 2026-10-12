@extends('layouts.app')

@section('title', 'Edit Instrumen BK')

@section('page-title', 'Edit Instrumen BK')

@section('content')

<div class="mx-auto max-w-7xl space-y-6">

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">

        <div>
            <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
                <a
                    href="{{ route('bk.show', $submission) }}"
                    class="transition hover:text-blue-600"
                >
                    Hasil Penilaian BK
                </a>

                <span>/</span>

                <span>Edit Data</span>
            </div>

            <h1 class="text-2xl font-bold text-slate-800">
                Edit Instrumen BK
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Perbarui data dan jawaban pengisian instrumen BK.
            </p>
        </div>

        <div class="flex flex-wrap gap-3">

            {{-- KEMBALI --}}
            <a
                href="{{ route('bk.show', $submission) }}"
                class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 19l-7-7 7-7"
                    />
                </svg>

                Kembali
            </a>

        </div>

    </div>


    {{-- =========================================================
        ERROR VALIDASI
    ========================================================== --}}
    @if ($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 p-4">

            <div class="flex gap-3">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mt-0.5 h-5 w-5 flex-shrink-0 text-red-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v4m0 4h.01M10.29 3.86l-8.18 14A2 2 0 003.84 21h16.32a2 2 0 001.73-3.14l-8.18-14a2 2 0 00-3.42 0z"
                    />
                </svg>

                <div>
                    <p class="font-semibold text-red-700">
                        Data belum dapat disimpan.
                    </p>

                    <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-600">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div>

            </div>

        </div>

    @endif


    {{-- =========================================================
        FORM
    ========================================================== --}}
    <form
        action="{{ route('bk.update', $submission) }}"
        method="POST"
        id="bkEditForm"
        class="space-y-6"
    >

        @csrf
        @method('PUT')


        {{-- =====================================================
            IDENTITAS PENGISIAN
        ====================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-lg font-bold text-slate-800">
                    Identitas Pengisian
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui informasi responden dan petugas Monev.
                </p>

            </div>


            <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-2">


                {{-- NAMA RESPONDEN --}}
                <div>

                    <label
                        for="nama_responden"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Responden
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_responden"
                        name="nama_responden"
                        value="{{ old('nama_responden', $submission->nama_responden) }}"
                        required
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- INSTANSI RESPONDEN --}}
                <div>

                    <label
                        for="instansi_responden"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Instansi Responden
                    </label>

                    <input
                        type="text"
                        id="instansi_responden"
                        name="instansi_responden"
                        value="{{ old('instansi_responden', $submission->instansi_responden) }}"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- KABUPATEN / KOTA --}}
                <div>

                    <label
                        for="kab_kota"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Kabupaten / Kota
                    </label>

                    <input
                        type="text"
                        id="kab_kota"
                        name="kab_kota"
                        value="{{ old('kab_kota', $submission->kab_kota) }}"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- NAMA PETUGAS --}}
                <div>

                    <label
                        for="nama_petugas_monev"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Petugas Monev
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_petugas_monev"
                        name="nama_petugas_monev"
                        value="{{ old('nama_petugas_monev', $submission->nama_petugas_monev) }}"
                        required
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- INSTANSI PETUGAS --}}
                <div>

                    <label
                        for="instansi_petugas"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Instansi Petugas
                    </label>

                    <input
                        type="text"
                        id="instansi_petugas"
                        name="instansi_petugas"
                        value="{{ old('instansi_petugas', $submission->instansi_petugas) }}"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- LOKASI MONEV --}}
                <div>

                    <label
                        for="lokasi_monev"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Lokasi Monev
                    </label>

                    <input
                        type="text"
                        id="lokasi_monev"
                        name="lokasi_monev"
                        value="{{ old('lokasi_monev', $submission->lokasi_monev) }}"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- TANGGAL --}}
                <div>

                    <label
                        for="tanggal_pelaksanaan"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Tanggal Pelaksanaan
                    </label>

                    <input
                        type="date"
                        id="tanggal_pelaksanaan"
                        name="tanggal_pelaksanaan"
                        value="{{ old(
                            'tanggal_pelaksanaan',
                            optional($submission->tanggal_pelaksanaan)->format('Y-m-d')
                        ) }}"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>

            </div>

        </section>


        {{-- =========================================================
            INFORMASI EDIT
        ========================================================== --}}
        <div class="rounded-xl border border-amber-200 bg-amber-50 px-5 py-4">

            <div class="flex gap-3">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mt-0.5 h-5 w-5 flex-shrink-0 text-amber-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 100-20 10 10 0 000 20z"
                    />
                </svg>

                <div>
                    <p class="text-sm font-semibold text-amber-800">
                        Mode Edit
                    </p>

                    <p class="mt-1 text-sm leading-6 text-amber-700">
                        Jawaban yang sudah tersimpan akan otomatis ditampilkan.
                        Silakan ubah jawaban yang diperlukan kemudian simpan perubahan.
                    </p>
                </div>

            </div>

        </div>


        {{-- =========================================================
            INDIKATOR BK
        ========================================================== --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                    <div>
                        <h2 class="text-lg font-bold text-slate-800">
                            Instrumen BK
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Periksa kembali setiap indikator dan pilih Ya atau Tidak.
                        </p>
                    </div>

                    <div class="rounded-lg bg-blue-50 px-4 py-2 text-sm font-semibold text-blue-700">
                        {{ $questions->count() }} indikator
                    </div>

                </div>

            </div>


            <div class="overflow-x-auto">

                <table class="min-w-full border-collapse">

                    <thead>

                        <tr class="bg-slate-50">

                            <th
                                class="w-20 border-b border-slate-200 px-6 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500"
                            >
                                No.
                            </th>

                            <th
                                class="border-b border-slate-200 px-6 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500"
                            >
                                Pertanyaan / Indikator
                            </th>

                            <th
                                class="w-28 border-b border-slate-200 px-3 py-4 text-center text-xs font-bold uppercase tracking-wide text-slate-500"
                            >
                                Ya
                            </th>

                            <th
                                class="w-28 border-b border-slate-200 px-3 py-4 text-center text-xs font-bold uppercase tracking-wide text-slate-500"
                            >
                                Tidak
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @php
                            $currentLevel = null;
                            $currentBagian = null;
                        @endphp


                        @forelse ($questions as $question)

                            @php
                                $existingAnswer = $answers->get($question->id);
                                $currentAnswer = old(
                                    "jawaban.{$question->id}",
                                    $existingAnswer
                                        ? ($existingAnswer->jawaban ? '1' : '0')
                                        : null
                                );
                            @endphp


                            {{-- =================================================
                                 BARIS LEVEL
                            ================================================== --}}
                            @if ($currentLevel !== $question->level)

                                @php
                                    $currentLevel = $question->level;
                                    $currentBagian = null;
                                @endphp

                                <tr>

                                    <td
                                        colspan="4"
                                        class="border-b border-slate-200 bg-blue-50 px-6 py-4"
                                    >

                                        <p class="text-sm font-bold text-slate-800">
                                            Level {{ $question->level }}

                                            <span class="font-medium text-slate-500">
                                                — {{ $question->level_nama }}
                                            </span>
                                        </p>

                                    </td>

                                </tr>

                            @endif


                            {{-- =================================================
                                 BARIS BAGIAN
                            ================================================== --}}
                            @if ($currentBagian !== $question->bagian)

                                @php
                                    $currentBagian = $question->bagian;
                                @endphp

                                <tr>

                                    <td
                                        colspan="4"
                                        class="border-b border-slate-100 bg-amber-50 px-6 py-3"
                                    >

                                        <p class="text-xs font-bold uppercase tracking-wide text-slate-700">

                                            {{ $question->bagian }}

                                            @if ($question->judul_bagian)

                                                <span class="font-medium normal-case tracking-normal text-slate-500">
                                                    — {{ $question->judul_bagian }}
                                                </span>

                                            @endif

                                        </p>

                                    </td>

                                </tr>

                            @endif


                            {{-- =================================================
                                 PERTANYAAN
                            ================================================== --}}
                            <tr class="transition hover:bg-slate-50">

                                <td
                                    class="border-b border-slate-100 px-6 py-5 align-top"
                                >

                                    <span class="text-sm font-semibold text-slate-500">
                                        {{ $question->nomor }}
                                    </span>

                                </td>


                                <td
                                    class="border-b border-slate-100 px-6 py-5 align-top"
                                >

                                    <p class="text-sm leading-6 text-slate-700">
                                        {{ $question->pernyataan }}
                                    </p>

                                </td>


                                {{-- YA --}}
                                <td
                                    class="border-b border-slate-100 px-3 py-5 text-center align-top"
                                >

                                    <label
                                        class="inline-flex cursor-pointer flex-col items-center gap-2"
                                    >

                                        <input
                                            type="radio"
                                            name="jawaban[{{ $question->id }}]"
                                            value="1"
                                            class="h-5 w-5 border-slate-300 text-emerald-600 focus:ring-emerald-500"
                                            {{ (string) $currentAnswer === '1' ? 'checked' : '' }}
                                        >

                                        <span class="text-xs font-semibold text-slate-500">
                                            Ya
                                        </span>

                                    </label>

                                </td>


                                {{-- TIDAK --}}
                                <td
                                    class="border-b border-slate-100 px-3 py-5 text-center align-top"
                                >

                                    <label
                                        class="inline-flex cursor-pointer flex-col items-center gap-2"
                                    >

                                        <input
                                            type="radio"
                                            name="jawaban[{{ $question->id }}]"
                                            value="0"
                                            class="h-5 w-5 border-slate-300 text-red-500 focus:ring-red-500"
                                            {{ (string) $currentAnswer === '0' ? 'checked' : '' }}
                                        >

                                        <span class="text-xs font-semibold text-slate-500">
                                            Tidak
                                        </span>

                                    </label>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="px-6 py-16 text-center"
                                >

                                    <p class="text-sm text-slate-400">
                                        Pertanyaan BK belum tersedia.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>


        {{-- =========================================================
            PERTANYAAN URAIAN
        ========================================================== --}}
        @if ($essayAnswers->count() > 0)

            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                <div class="border-b border-slate-200 px-6 py-5">

                    <h2 class="text-lg font-bold text-slate-800">
                        Pertanyaan Uraian
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Perbarui jawaban uraian jika diperlukan.
                    </p>

                </div>


                <div class="space-y-5 p-6">

                    @foreach ($essayAnswers as $essay)

                        <div>

                            <label
                                class="mb-2 block text-sm font-semibold text-slate-700"
                            >
                                {{ $essay->nomor }}.
                                {{ $essay->pertanyaan }}
                            </label>

                            <textarea
                                name="essay[{{ $essay->nomor }}][pertanyaan]"
                                class="hidden"
                            >{{ $essay->pertanyaan }}</textarea>

                            <textarea
                                name="essay[{{ $essay->nomor }}][jawaban]"
                                rows="5"
                                class="w-full resize-y rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                            >{{ old(
                                "essay.{$essay->nomor}.jawaban",
                                $essay->jawaban
                            ) }}</textarea>

                        </div>

                    @endforeach

                </div>

            </section>

        @endif


        {{-- =========================================================
            TOMBOL SIMPAN
        ========================================================== --}}
        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-end">

            <a
                href="{{ route('bk.show', $submission) }}"
                class="inline-flex h-12 items-center justify-center rounded-xl border border-slate-300 bg-white px-6 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
            >
                Batal
            </a>


            <button
                type="submit"
                class="inline-flex h-12 items-center justify-center gap-2 rounded-xl bg-blue-600 px-7 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@endsection