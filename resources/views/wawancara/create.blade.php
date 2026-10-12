@extends('layouts.app')

@section('title', 'Tambah Wawancara')

@section('content')
    <div class="mx-auto max-w-6xl space-y-6 pb-8">

        {{-- HEADER --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-start gap-3">
                <a href="{{ route('wawancara.index') }}"
                    class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-600 transition hover:bg-slate-50"
                    aria-label="Kembali">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>

                <div>
                    <p class="text-sm font-semibold text-blue-700">
                        Lembar Wawancara
                    </p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-800">
                        Tambah Wawancara BCKS
                    </h1>
                    <p class="mt-1 text-sm text-slate-500">
                        Lengkapi informasi kegiatan, narasumber, dan jawaban esai.
                    </p>
                </div>
            </div>
        </div>

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <p class="font-semibold">Data belum dapat disimpan.</p>
                <ul class="mt-2 list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('wawancara.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- B. IDENTITAS RESPONDEN --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-700">
                        <span class="font-bold">B</span>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-800">Identitas Responden</h2>
                        <p class="text-sm text-slate-500">Informasi pihak yang memberikan jawaban wawancara.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-2">
                    <div>
                        <label for="nama_responden" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nama Responden <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nama_responden" name="nama_responden"
                            value="{{ old('nama_responden', old('nama_narasumber')) }}" required maxlength="255"
                            placeholder="Masukkan nama responden"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        @error('nama_responden')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="unit_kerja_responden" class="mb-2 block text-sm font-semibold text-slate-700">
                            Unit Kerja Responden <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="unit_kerja_responden" name="unit_kerja_responden"
                            value="{{ old('unit_kerja_responden') }}" required maxlength="255"
                            placeholder="Masukkan unit kerja responden"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        @error('unit_kerja_responden')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="status_responden" class="mb-2 block text-sm font-semibold text-slate-700">
                            Status Responden <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="status_responden" name="status_responden"
                            value="{{ old('status_responden', old('jabatan_narasumber')) }}" required maxlength="255"
                            placeholder="Masukkan status responden"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        @error('status_responden')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- C. PETUGAS MONEV --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <span class="font-bold">C</span>
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-800">Petugas Monev</h2>
                        <p class="text-sm text-slate-500">Identitas petugas yang melaksanakan monitoring dan evaluasi.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-2">
                    <div>
                        <label for="nama_petugas_monev" class="mb-2 block text-sm font-semibold text-slate-700">
                            Nama Petugas Monev <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nama_petugas_monev" name="nama_petugas_monev"
                            value="{{ old('nama_petugas_monev', old('nama_pewawancara')) }}" required maxlength="255"
                            placeholder="Masukkan nama petugas Monev"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        @error('nama_petugas_monev')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="unit_kerja_petugas" class="mb-2 block text-sm font-semibold text-slate-700">
                            Unit Kerja Petugas <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="unit_kerja_petugas" name="unit_kerja_petugas"
                            value="{{ old('unit_kerja_petugas') }}" required maxlength="255"
                            placeholder="Masukkan unit kerja petugas"
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
                        @error('unit_kerja_petugas')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>


            {{-- PERTANYAAN ESAI BCKS --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="font-bold text-slate-800">
                                Hasil Wawancara BCKS
                            </h2>
                            <p class="text-sm text-slate-500">
                                Lima pertanyaan esai untuk menggali pengalaman dan implementasi hasil pelatihan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 p-6">

                    {{-- PERTANYAAN 1 --}}
                    <div>
                        <div class="mb-3 flex items-start gap-3">
                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-700">
                                1
                            </span>
                            <div>
                                <h3 class="font-semibold text-slate-800">
                                    Dampak Implementasi RPTKS
                                </h3>
                                <p class="mt-1 text-sm leading-6 text-slate-600">
                                    Dari seluruh RPTKS (Rancangan Projek Integratif dan Transformatif Kepala Sekolah) yang
                                    Anda susun setelah pelatihan, apakah berdampak setelah diimplementasikan di sekolah? Apa
                                    kunci keberhasilannya?
                                </p>
                            </div>
                        </div>

                        <textarea name="jawaban_1" id="jawaban_1" rows="5"
                            placeholder="Tuliskan jawaban narasumber secara lengkap..."
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('jawaban_1') }}</textarea>
                        @error('jawaban_1')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="border-t border-slate-100"></div>

                    {{-- PERTANYAAN 2 --}}
                    <div>
                        <div class="mb-3 flex items-start gap-3">
                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-700">
                                2
                            </span>
                            <div>
                                <h3 class="font-semibold text-slate-800">
                                    Kendala dan Strategi Mitigasi
                                </h3>
                                <p class="mt-1 text-sm leading-6 text-slate-600">
                                    Kendala (sistem, anggaran, maupun resistensi SDM) apa yang Anda hadapi saat menerapkan
                                    Rancangan Projek tersebut? Bagaimana Anda mengatasinya?
                                </p>
                            </div>
                        </div>

                        <textarea name="jawaban_2" id="jawaban_2" rows="5"
                            placeholder="Tuliskan kendala dan strategi penyelesaiannya..."
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('jawaban_2') }}</textarea>
                        @error('jawaban_2')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="border-t border-slate-100"></div>

                    {{-- PERTANYAAN 3 --}}
                    <div>
                        <div class="mb-3 flex items-start gap-3">
                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-700">
                                3
                            </span>
                            <div>
                                <h3 class="font-semibold text-slate-800">
                                    Perubahan Kepemimpinan dan Pengambilan Keputusan
                                </h3>
                                <p class="mt-1 text-sm leading-6 text-slate-600">
                                    Bagaimana Anda merasakan perubahan pada cara Anda mengambil keputusan strategis dan
                                    mengelola konflik di sekolah setelah mengikuti pelatihan BCKS?
                                </p>
                            </div>
                        </div>

                        <textarea name="jawaban_3" id="jawaban_3" rows="5"
                            placeholder="Tuliskan perubahan yang dirasakan narasumber..."
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('jawaban_3') }}</textarea>
                        @error('jawaban_3')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="border-t border-slate-100"></div>

                    {{-- PERTANYAAN 4 --}}
                    <div>
                        <div class="mb-3 flex items-start gap-3">
                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-700">
                                4
                            </span>
                            <div>
                                <h3 class="font-semibold text-slate-800">
                                    Dukungan Lingkungan Sekolah
                                </h3>
                                <p class="mt-1 text-sm leading-6 text-slate-600">
                                    Sejauh mana dukungan dari Kepala Sekolah (saat ini), rekan guru, dan pengawas sekolah
                                    membantu Anda mengeksekusi ide-ide baru di sekolah?
                                </p>
                            </div>
                        </div>

                        <textarea name="jawaban_4" id="jawaban_4" rows="5"
                            placeholder="Tuliskan bentuk dukungan dan pengaruhnya..."
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('jawaban_4') }}</textarea>
                        @error('jawaban_4')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="border-t border-slate-100"></div>

                    {{-- PERTANYAAN 5 --}}
                    <div>
                        <div class="mb-3 flex items-start gap-3">
                            <span
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-700">
                                5
                            </span>
                            <div>
                                <h3 class="font-semibold text-slate-800">
                                    Keberlanjutan Program Inovasi
                                </h3>
                                <p class="mt-1 text-sm leading-6 text-slate-600">
                                    Bagaimana cara Anda memastikan program inovasi yang telah dimulai tetap berjalan
                                    berkelanjutan meskipun terjadi pergantian kepemimpinan atau personil?
                                </p>
                            </div>
                        </div>

                        <textarea name="jawaban_5" id="jawaban_5" rows="5"
                            placeholder="Tuliskan strategi menjaga keberlanjutan program..."
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('jawaban_5') }}</textarea>
                        @error('jawaban_5')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </section>

            {{-- CATATAN TAMBAHAN --}}
            <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-6 py-5">
                    <h2 class="font-bold text-slate-800">Catatan Tambahan</h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Catat informasi lain yang relevan dengan wawancara.
                    </p>
                </div>

                <div class="space-y-5 p-6">
                    <div>
                        <label for="hasil_wawancara" class="mb-2 block text-sm font-semibold text-slate-700">
                            Ringkasan Hasil Wawancara
                        </label>
                        <textarea id="hasil_wawancara" name="hasil_wawancara" rows="4"
                            placeholder="Masukkan ringkasan umum hasil wawancara..."
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('hasil_wawancara') }}</textarea>
                        @error('hasil_wawancara')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="catatan" class="mb-2 block text-sm font-semibold text-slate-700">
                            Catatan Pewawancara
                        </label>
                        <textarea id="catatan" name="catatan" rows="3" placeholder="Masukkan catatan tambahan..."
                            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">{{ old('catatan') }}</textarea>
                        @error('catatan')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- TOMBOL AKSI --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('wawancara.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Batal
                </a>

                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-offset-2">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Wawancara
                </button>
            </div>

        </form>
    </div>
@endsection