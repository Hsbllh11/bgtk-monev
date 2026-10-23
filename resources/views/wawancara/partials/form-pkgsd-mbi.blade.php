@php
    $v = fn(string $key, $default = '') => old($key, $values[$key] ?? $default);
    $pertanyaan = config('pkgsd_wawancara.pertanyaan');
    $pilihanJabatan = config('pkgsd_wawancara.jabatan');
    $input = 'w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-800 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100';
@endphp

<div class="mx-auto max-w-5xl space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
                <a href="{{ route('wawancara.index') }}" class="hover:text-blue-600">Wawancara</a>
                <span>/</span>
                <span>{{ $judul }}</span>
            </div>

            <h1 class="text-2xl font-bold text-slate-800">{{ $judul }}</h1>
            <p class="mt-2 text-sm text-slate-500">
                Lengkapi identitas petugas, identitas responden, dan hasil wawancara.
            </p>
        </div>

        <a href="{{ $batal }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Kembali
        </a>
    </div>

    <section class="overflow-hidden rounded-2xl bg-white shadow-sm"
        style="border: 1px solid #e2e8f0; border-left: 4px solid #0891b2;">
        <div class="p-6">
            <h2 class="text-lg font-bold text-slate-800">Panduan Wawancara PKGSD MBI</h2>
            <p class="mt-1 text-sm leading-6 text-slate-500">
                Isilah identitas dan tuliskan jawaban berdasarkan hasil wawancara
                dengan responden secara jelas dan sesuai fakta.
            </p>
        </div>
    </section>

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <p class="font-semibold">Periksa kembali isian formulir.</p>
            <ul class="mt-2 list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $action }}" method="POST" class="space-y-6">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        {{-- A. Identitas Petugas Monev --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                <h2 class="font-bold text-slate-800">A. Identitas Petugas Monev</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Informasi petugas yang melaksanakan monitoring dan evaluasi.
                </p>
            </div>

            <div class="grid gap-5 p-6 md:grid-cols-2">
                <div>
                    <label for="nama_petugas_monev" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Petugas Monev <span class="text-red-500">*</span>
                    </label>
                    <input id="nama_petugas_monev" name="nama_petugas_monev"
                        value="{{ $v('nama_petugas_monev') }}" required maxlength="255" class="{{ $input }}">
                    @error('nama_petugas_monev') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="instansi_petugas" class="mb-2 block text-sm font-semibold text-slate-700">
                        Instansi Petugas <span class="text-red-500">*</span>
                    </label>
                    <input id="instansi_petugas" name="instansi_petugas" value="{{ $v('instansi_petugas') }}"
                        required maxlength="255" placeholder="Contoh: BGTK Provinsi NTB" class="{{ $input }}">
                    @error('instansi_petugas') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="lokasi_monev" class="mb-2 block text-sm font-semibold text-slate-700">
                        Lokasi Monev <span class="text-red-500">*</span>
                    </label>
                    <input id="lokasi_monev" name="lokasi_monev" value="{{ $v('lokasi_monev') }}" required
                        maxlength="255" placeholder="Masukkan lokasi Monev" class="{{ $input }}">
                    @error('lokasi_monev') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="tanggal_pelaksanaan" class="mb-2 block text-sm font-semibold text-slate-700">
                        Tanggal Pelaksanaan <span class="text-red-500">*</span>
                    </label>
                    <input id="tanggal_pelaksanaan" type="date" name="tanggal_pelaksanaan"
                        value="{{ $v('tanggal_pelaksanaan', now()->format('Y-m-d')) }}" required
                        class="{{ $input }}">
                    @error('tanggal_pelaksanaan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </section>

        {{-- B. Identitas Responden --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                <h2 class="font-bold text-slate-800">B. Identitas Responden</h2>
                <p class="mt-1 text-sm text-slate-500">Tanda bintang (*) menunjukkan kolom wajib diisi.</p>
            </div>

            <div class="grid gap-5 p-6 md:grid-cols-2">
                <div>
                    <label for="nama_responden" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Responden <span class="text-red-500">*</span>
                    </label>
                    <input id="nama_responden" name="nama_responden" value="{{ $v('nama_responden') }}" required
                        maxlength="255" class="{{ $input }}">
                    @error('nama_responden') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="jabatan_responden" class="mb-2 block text-sm font-semibold text-slate-700">
                        Jabatan Responden <span class="text-red-500">*</span>
                    </label>
                    <select id="jabatan_responden" name="jabatan_responden" required class="{{ $input }} bg-white">
                        <option value="" disabled @selected($v('jabatan_responden') === '')>Pilih jabatan</option>
                        @foreach ($pilihanJabatan as $pilihan)
                            <option value="{{ $pilihan }}" @selected($v('jabatan_responden') === $pilihan)>
                                {{ $pilihan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jabatan_responden') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="satuan_pendidikan" class="mb-2 block text-sm font-semibold text-slate-700">
                        Satuan Pendidikan <span class="text-red-500">*</span>
                    </label>
                    <input id="satuan_pendidikan" name="satuan_pendidikan" value="{{ $v('satuan_pendidikan') }}"
                        required maxlength="255" placeholder="Nama sekolah atau satuan pendidikan"
                        class="{{ $input }}">
                    @error('satuan_pendidikan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="masa_kerja" class="mb-2 block text-sm font-semibold text-slate-700">
                        Masa Kerja (tahun) <span class="text-red-500">*</span>
                    </label>
                    <input id="masa_kerja" name="masa_kerja" type="number" min="0" max="100" step="0.5"
                        value="{{ $v('masa_kerja') }}" required placeholder="Contoh: 5 atau 5.5"
                        class="{{ $input }}">
                    @error('masa_kerja') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="nama_pelatihan" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Kegiatan/Pelatihan <span class="text-red-500">*</span>
                    </label>
                    <input id="nama_pelatihan" name="nama_pelatihan"
                        value="{{ $v('nama_pelatihan', 'Pelatihan PKGSD MBI') }}" required maxlength="255"
                        class="{{ $input }}">
                    @error('nama_pelatihan') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="tanggal_wawancara" class="mb-2 block text-sm font-semibold text-slate-700">
                        Tanggal Pengisian <span class="text-red-500">*</span>
                    </label>
                    <input id="tanggal_wawancara" name="tanggal_wawancara" type="date"
                        value="{{ $v('tanggal_wawancara', now()->format('Y-m-d')) }}" required
                        class="{{ $input }}">
                    @error('tanggal_wawancara') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </section>

        {{-- C. Pertanyaan Wawancara Terbuka --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 bg-slate-50 px-6 py-4">
                <h2 class="font-bold text-slate-800">C. Pertanyaan Wawancara Terbuka</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Jawablah berdasarkan pengalaman setelah mengikuti pelatihan. Seluruh pertanyaan wajib diisi.
                </p>
            </div>

            <div class="space-y-6 p-6">
                @foreach ($pertanyaan as $nomor => $teks)
                    <div>
                        <label for="jawaban_{{ $nomor }}"
                            class="mb-2 block text-sm font-semibold leading-6 text-slate-700">
                            {{ $nomor }}. {{ $teks }} <span class="text-red-500">*</span>
                        </label>
                        <textarea id="jawaban_{{ $nomor }}" name="jawaban_{{ $nomor }}" rows="4" required
                            placeholder="Tuliskan jawaban secara jelas dan lengkap..."
                            class="{{ $input }} leading-6">{{ $v('jawaban_' . $nomor) }}</textarea>
                        @error('jawaban_' . $nomor)
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
            </div>
        </section>

        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
            @if ($batal !== route('wawancara.index'))
                <a href="{{ $batal }}"
                    class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                    Batal
                </a>
            @endif

            <button type="submit"
                class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                {{ $tombol }}
            </button>
        </div>
    </form>
</div>