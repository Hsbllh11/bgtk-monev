@extends('layouts.app')

@section('title', 'Edit Wawancara')

@section('page-title', 'Edit Wawancara')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Edit Wawancara
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Perbarui informasi data wawancara.
            </p>
        </div>

        <a
            href="{{ route('wawancara.show', ['wawancara' => $wawancara->id]) }}"
            class="inline-flex w-fit items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
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


    {{-- Error Validation --}}
    @if ($errors->any())

        <div class="rounded-xl border border-red-200 bg-red-50 p-5">

            <div class="flex gap-3">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mt-0.5 h-5 w-5 shrink-0 text-red-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v2m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20.5h15.6a2 2 0 001.73-3.14l-7.82-13.5a2 2 0 00-3.42 0z"
                    />
                </svg>

                <div>
                    <p class="font-semibold text-red-700">
                        Terdapat kesalahan pada data.
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


    {{-- Form --}}
    <form
        action="{{ route('wawancara.update', ['wawancara' => $wawancara->id]) }}"
        method="POST"
        class="space-y-6"
    >

        @csrf
        @method('PUT')


        {{-- Data Utama --}}
        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-4">

                <h2 class="text-base font-bold text-slate-800">
                    Data Pelaksanaan
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui instrumen, sekolah, tanggal, dan status wawancara.
                </p>

            </div>


            <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">

                {{-- Instrumen --}}
                <div>

                    <label
                        for="instrumen_id"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Instrumen
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="instrumen_id"
                        name="instrumen_id"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option value="">
                            -- Pilih Instrumen --
                        </option>

                        @foreach ($instrumens as $instrumen)

                            <option
                                value="{{ $instrumen->id }}"
                                {{ old('instrumen_id', $wawancara->instrumen_id) == $instrumen->id ? 'selected' : '' }}
                            >
                                {{ $instrumen->kode_instrumen }}
                                - {{ $instrumen->nama_instrumen }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Sekolah --}}
                <div>

                    <label
                        for="sekolah_id"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Sekolah
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="sekolah_id"
                        name="sekolah_id"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option value="">
                            -- Pilih Sekolah --
                        </option>

                        @foreach ($sekolahs as $sekolah)

                            <option
                                value="{{ $sekolah->id }}"
                                {{ old('sekolah_id', $wawancara->sekolah_id) == $sekolah->id ? 'selected' : '' }}
                            >
                                {{ $sekolah->npsn }}
                                - {{ $sekolah->nama_sekolah }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Tanggal --}}
                <div>

                    <label
                        for="tanggal_wawancara"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Tanggal Wawancara
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="date"
                        id="tanggal_wawancara"
                        name="tanggal_wawancara"
                        value="{{ old('tanggal_wawancara', $wawancara->tanggal_wawancara?->format('Y-m-d')) }}"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- Status --}}
                <div>

                    <label
                        for="status"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Status
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                        <option
                            value="Belum Dilaksanakan"
                            {{ old('status', $wawancara->status) === 'Belum Dilaksanakan' ? 'selected' : '' }}
                        >
                            Belum Dilaksanakan
                        </option>

                        <option
                            value="Selesai"
                            {{ old('status', $wawancara->status) === 'Selesai' ? 'selected' : '' }}
                        >
                            Selesai
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- Data Narasumber --}}
        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-4">

                <h2 class="text-base font-bold text-slate-800">
                    Data Narasumber
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui informasi narasumber dan pewawancara.
                </p>

            </div>


            <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">

                {{-- Nama Narasumber --}}
                <div>

                    <label
                        for="nama_narasumber"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Narasumber
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_narasumber"
                        name="nama_narasumber"
                        value="{{ old('nama_narasumber', $wawancara->nama_narasumber) }}"
                        required
                        placeholder="Masukkan nama narasumber"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- Jabatan --}}
                <div>

                    <label
                        for="jabatan_narasumber"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Jabatan Narasumber
                    </label>

                    <input
                        type="text"
                        id="jabatan_narasumber"
                        name="jabatan_narasumber"
                        value="{{ old('jabatan_narasumber', $wawancara->jabatan_narasumber) }}"
                        placeholder="Contoh: Kepala Sekolah"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>


                {{-- Pewawancara --}}
                <div class="md:col-span-2">

                    <label
                        for="nama_pewawancara"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Pewawancara
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="text"
                        id="nama_pewawancara"
                        name="nama_pewawancara"
                        value="{{ old('nama_pewawancara', $wawancara->nama_pewawancara) }}"
                        required
                        placeholder="Masukkan nama pewawancara"
                        class="w-full rounded-lg border border-slate-300 px-4 py-2.5 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >

                </div>

            </div>

        </div>


        {{-- Hasil dan Catatan --}}
        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-4">

                <h2 class="text-base font-bold text-slate-800">
                    Hasil dan Catatan
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui hasil wawancara dan catatan tambahan.
                </p>

            </div>


            <div class="space-y-6 p-6">

                {{-- Hasil Wawancara --}}
                <div>

                    <label
                        for="hasil_wawancara"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Hasil Wawancara
                    </label>

                    <textarea
                        id="hasil_wawancara"
                        name="hasil_wawancara"
                        rows="6"
                        placeholder="Masukkan hasil wawancara..."
                        class="w-full resize-y rounded-lg border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('hasil_wawancara', $wawancara->hasil_wawancara) }}</textarea>

                </div>


                {{-- Catatan --}}
                <div>

                    <label
                        for="catatan"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Catatan
                    </label>

                    <textarea
                        id="catatan"
                        name="catatan"
                        rows="4"
                        placeholder="Masukkan catatan tambahan..."
                        class="w-full resize-y rounded-lg border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('catatan', $wawancara->catatan) }}</textarea>

                </div>

            </div>

        </div>


        {{-- Tombol --}}
        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

            <a
                href="{{ route('wawancara.show', ['wawancara' => $wawancara->id]) }}"
                class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
            >
                Batal
            </a>

            <button
                type="submit"
                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700"
            >
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection