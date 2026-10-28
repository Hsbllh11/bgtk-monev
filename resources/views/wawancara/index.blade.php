@extends('layouts.app')

@section('title', 'Lembar Wawancara')

@section('page-title', 'Lembar Wawancara')

@section('content')

    @php
        // Palet warna per jenis wawancara (sama dengan halaman Instrumen Pemantauan).
        $paletJenis = [
            'BCKS' => [
                'no' => '01',
                'judul' => 'Wawancara BCKS',
                'desk' => 'Form wawancara BCKS.',
                'solid' => '#2563eb',
                'hover' => '#1d4ed8',
                'bg' => '#eff6ff',
                'border' => '#bfdbfe',
                'text' => '#1d4ed8',
                'route' => 'wawancara.bcks.create',
                'label' => 'Wawancara BCKS',
            ],
            'BK' => [
                'no' => '02',
                'judul' => 'Wawancara BK',
                'desk' => 'Form wawancara BK.',
                'solid' => '#7c3aed',
                'hover' => '#6d28d9',
                'bg' => '#f5f3ff',
                'border' => '#ddd6fe',
                'text' => '#6d28d9',
                'route' => 'wawancara.bk.create',
                'label' => 'Wawancara BK',
            ],
            'TENDIK' => [
                'no' => '03',
                'judul' => 'Wawancara TENDIK',
                'desk' => 'Form wawancara TENDIK.',
                'solid' => '#059669',
                'hover' => '#047857',
                'bg' => '#ecfdf5',
                'border' => '#a7f3d0',
                'text' => '#047857',
                'route' => 'wawancara.tendik.create',
                'label' => 'Wawancara TENDIK',
            ],
            'GEMBIRA' => [
                'no' => '04',
                'judul' => 'Wawancara Matematika GEMBIRA',
                'desk' => 'Form wawancara program Matematika GEMBIRA.',
                'solid' => '#f59e0b',
                'hover' => '#d97706',
                'bg' => '#fffbeb',
                'border' => '#fde68a',
                'text' => '#b45309',
                'route' => 'wawancara.gembira.create',
                'label' => 'Wawancara Matematika GEMBIRA',
            ],
            'PKGSD MBI' => [
                'no' => '05',
                'judul' => 'Wawancara PKGSD MBI',
                'desk' => 'Form wawancara PKGSD MBI.',
                'solid' => '#0891b2',
                'hover' => '#0e7490',
                'bg' => '#ecfeff',
                'border' => '#a5f3fc',
                'text' => '#0e7490',
                'route' => 'wawancara.pkgsd-mbi.create',
                'label' => 'Wawancara PKGSD MBI',
            ],
        ];

        $barisAtas = array_slice($paletJenis, 0, 3, true);
        $barisBawah = array_slice($paletJenis, 3, null, true);
    @endphp

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- =========================================================
        HEADER
        ========================================================== --}}
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-800">
                Lembar Wawancara
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Kelola lembar wawancara monitoring dan evaluasi.
            </p>
        </div>


        {{-- =========================================================
        NOTIFIKASI
        ========================================================== --}}
        @foreach (['success' => 'emerald', 'info' => 'blue'] as $jenisPesan => $warnaPesan)
            @if (session($jenisPesan))
                <div id="alert-{{ $jenisPesan }}" role="alert"
                    class="flex items-center justify-between gap-4 rounded-xl border px-4 py-3 text-sm transition-all duration-300"
                    style="border-color: {{ $warnaPesan === 'emerald' ? '#a7f3d0' : '#bfdbfe' }};
                                       background: {{ $warnaPesan === 'emerald' ? '#ecfdf5' : '#eff6ff' }};
                                       color: {{ $warnaPesan === 'emerald' ? '#047857' : '#1d4ed8' }};">
                    <div class="flex items-center gap-2">
                        @if ($jenisPesan === 'success')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16v-4m0-4h.01" />
                            </svg>
                        @endif

                        <span>{{ session($jenisPesan) }}</span>
                    </div>

                    <button type="button" onclick="tutupNotifikasi('alert-{{ $jenisPesan }}')"
                        class="shrink-0 text-xl font-semibold opacity-70 hover:opacity-100" aria-label="Tutup notifikasi">
                        &times;
                    </button>
                </div>
            @endif
        @endforeach

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <p class="mb-2 font-semibold">Periksa kembali data berikut:</p>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


        {{-- =========================================================
        KARTU JENIS WAWANCARA (3 + 2, sama seperti Instrumen Pemantauan)
        ========================================================== --}}
        @foreach ([$barisAtas, $barisBawah] as $barisKartu)
            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

                @foreach ($barisKartu as $kode => $k)
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                        <div class="h-1.5" style="background: {{ $k['solid'] }};"></div>

                        <div class="p-5">

                            <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium"
                                style="background: {{ $k['bg'] }}; border: 1px solid {{ $k['border'] }}; color: {{ $k['text'] }};">
                                Instrumen {{ $k['no'] }}
                            </span>

                            <h3 class="mt-4 text-lg font-bold text-slate-800">
                                {{ $k['judul'] }}
                            </h3>

                            <p class="mt-1 text-sm leading-6 text-slate-500">
                                {{ $k['desk'] }}
                            </p>

                            <div class="mt-6 grid grid-cols-2 gap-2">

                                <a href="{{ route($k['route']) }}"
                                    class="flex items-center justify-center gap-2 rounded-xl px-3 py-3 text-sm font-semibold text-white"
                                    style="background-color: {{ $k['solid'] }};"
                                    onmouseover="this.style.backgroundColor='{{ $k['hover'] }}'"
                                    onmouseout="this.style.backgroundColor='{{ $k['solid'] }}'">
                                    + Isi Wawancara
                                </a>

                                <a href="{{ route('wawancara.index', ['jenis_instrumen' => $kode]) }}"
                                    class="flex items-center justify-center rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-xs font-semibold text-slate-700 hover:bg-slate-50">
                                    Lihat Riwayat
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @endforeach


        {{-- =========================================================
        FILTER
        ========================================================== --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <form action="{{ route('wawancara.index') }}" method="GET">
                <div class="grid grid-cols-1 items-end gap-4 md:grid-cols-2 xl:grid-cols-4">

                    <div>
                        <label for="jenis_instrumen" class="mb-2 block text-sm font-medium text-slate-700">
                            Jenis Wawancara
                        </label>
                        <select id="jenis_instrumen" name="jenis_instrumen"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            style="height: 44px">
                            <option value="">Semua jenis</option>
                            <option value="BCKS" @selected(request('jenis_instrumen') === 'BCKS')>Wawancara BCKS</option>
                            <option value="BK" @selected(request('jenis_instrumen') === 'BK')>Wawancara BK</option>
                            <option value="TENDIK" @selected(request('jenis_instrumen') === 'TENDIK')>Wawancara TENDIK
                            </option>
                            <option value="GEMBIRA" @selected(request('jenis_instrumen') === 'GEMBIRA')>
                                Wawancara Matematika GEMBIRA
                            </option>
                            <option value="PKGSD MBI" @selected(request('jenis_instrumen') === 'PKGSD MBI')>
                                Wawancara PKGSD MBI
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="status" class="mb-2 block text-sm font-medium text-slate-700">
                            Status
                        </label>
                        <select id="status" name="status"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            style="height: 44px">
                            <option value="">Semua status</option>
                            <option value="Belum Dilaksanakan" @selected(request('status') === 'Belum Dilaksanakan')>Belum
                                Dilaksanakan</option>
                            <option value="Selesai" @selected(request('status') === 'Selesai')>Selesai</option>
                        </select>
                    </div>

                    <div>
                        <label for="search" class="mb-2 block text-sm font-medium text-slate-700">
                            Pencarian
                        </label>
                        <input id="search" type="text" name="search" value="{{ request('search') }}"
                            placeholder="Nama, responden, atau sekolah"
                            class="w-full rounded-xl border border-slate-200 px-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                            style="height: 44px">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                            class="inline-flex flex-1 items-center justify-center rounded-xl px-5 text-sm font-semibold text-white transition hover:opacity-90"
                            style="height: 44px; background: #1457f5">
                            Cari
                        </button>
                        <a href="{{ route('wawancara.index') }}"
                            class="inline-flex flex-1 items-center justify-center rounded-xl border border-slate-200 bg-white px-4 text-sm font-medium text-slate-600 transition hover:bg-slate-50"
                            style="height: 44px">
                            Reset
                        </a>
                    </div>

                </div>
            </form>
        </div>


        {{-- =========================================================
        RIWAYAT WAWANCARA
        ========================================================== --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">

                <h3 class="text-lg font-bold text-slate-800">
                    Riwayat Wawancara
                </h3>

                <p class="mt-1 text-sm text-slate-500">
                    Daftar wawancara monitoring dan evaluasi yang telah diisi.
                </p>

            </div>


            <div class="w-full min-w-0 overflow-x-auto">

                <table class="w-full min-w-[1000px] table-auto text-left">

                    <thead class="bg-slate-50">

                        <tr class="border-b border-slate-200">

                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase text-slate-500">
                                Jenis Wawancara
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase text-slate-500">
                                BCKS / Narasumber
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase text-slate-500">
                                Responden
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase text-slate-500">
                                Tanggal Evaluasi
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-xs font-bold uppercase text-slate-500">
                                Status
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-center text-xs font-bold uppercase text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($wawancaras as $wawancara)

                            @php
                                $jenisData = strtoupper(trim($wawancara->jenis_wawancara ?? ''));
                                $namaInstrumen = strtoupper($wawancara->instrumen->nama_instrumen ?? '');

                                if ($jenisData === 'BCKS' || str_contains($namaInstrumen, 'BCKS')) {
                                    $kodeJenis = 'BCKS';
                                } elseif (in_array($jenisData, ['BK', 'TENDIK', 'GEMBIRA', 'PKGSD MBI'], true)) {
                                    $kodeJenis = $jenisData;
                                } else {
                                    $kodeJenis = 'LAMA';
                                }

                                $labelJenis = $paletJenis[$kodeJenis]['label']
                                    ?? ($wawancara->instrumen->nama_instrumen ?? 'Wawancara Lama');

                                $warna = $paletJenis[$kodeJenis]
                                    ?? ['bg' => '#f8fafc', 'border' => '#e2e8f0', 'text' => '#475569'];

                                $gayaJenis = "background: {$warna['bg']}; border: 1px solid {$warna['border']}; color: {$warna['text']};";

                                $namaBcks = $wawancara->nama_responden
                                    ?: $wawancara->nama_narasumber
                                    ?: '-';

                                $unitBcks = $wawancara->status_responden
                                    ?: $wawancara->jabatan_narasumber
                                    ?: '-';

                                $namaResponden = $wawancara->nama_responden
                                    ?: $wawancara->nama_narasumber
                                    ?: '-';

                                $unitResponden = $wawancara->unit_kerja_responden
                                    ?: $wawancara->jabatan_narasumber;

                                $tanggal = $wawancara->tanggal_evaluasi
                                    ?: $wawancara->tanggal_wawancara;

                                $statusWawancara = $wawancara->status ?: 'Belum Dilaksanakan';
                                $isSelesai = $statusWawancara === 'Selesai';
                            @endphp

                            <tr class="cursor-pointer transition hover:bg-blue-50"
                                onclick="window.location='{{ route('wawancara.show', $wawancara->id) }}'"
                                title="Klik untuk melihat detail wawancara">

                                {{-- JENIS WAWANCARA --}}
                                <td class="min-w-[280px] px-5 py-4 align-middle">
                                    <div class="flex min-w-0 items-start gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl"
                                            style="{{ $gayaJenis }}">
                                            📋
                                        </div>

                                        <div class="min-w-0 space-y-1">
                                            <p class="text-sm font-bold leading-5 text-slate-800">
                                                {{ $labelJenis }}
                                            </p>
                                            <span
                                                class="inline-flex max-w-full items-center whitespace-normal break-words rounded-full px-2.5 py-1 text-xs font-medium leading-4"
                                                style="{{ $gayaJenis }}">
                                                {{ $kodeJenis }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                {{-- BCKS / NARASUMBER --}}
                                <td class="min-w-[200px] px-6 py-5">
                                    <p class="text-sm font-medium text-slate-700">{{ $namaBcks }}</p>
                                    @if ($unitBcks !== '-')
                                        <p class="mt-1 text-xs leading-5 text-slate-500">{{ $unitBcks }}</p>
                                    @endif
                                </td>

                                {{-- RESPONDEN --}}
                                <td class="min-w-[200px] px-6 py-5">
                                    <p class="text-sm font-medium text-slate-700">{{ $namaResponden }}</p>
                                    @if ($unitResponden)
                                        <p class="mt-1 text-xs leading-5 text-slate-500">{{ $unitResponden }}</p>
                                    @endif
                                </td>

                                {{-- TANGGAL --}}
                                <td class="whitespace-nowrap px-6 py-5">
                                    @if ($tanggal)
                                        <p class="text-sm font-medium text-slate-700">
                                            {{ \Illuminate\Support\Carbon::parse($tanggal)->format('d/m/Y') }}
                                        </p>
                                    @else
                                        <span class="text-sm text-slate-400">-</span>
                                    @endif
                                </td>

                                {{-- STATUS --}}
                                <td class="whitespace-nowrap px-6 py-5">
                                    @if ($isSelesai)
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Selesai
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-amber-100 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            {{ $statusWawancara }}
                                        </span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="whitespace-nowrap px-6 py-5" onclick="event.stopPropagation()">

                                    <div class="flex items-center justify-center gap-2">

                                        <!-- Tombol Detail (Ikon Mata) -->
                                        <a href="{{ route('wawancara.show', $wawancara->id) }}" title="Lihat Detail"
                                            class="inline-flex items-center justify-center rounded-lg border border-slate-200 p-2 text-slate-600 transition hover:bg-slate-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Edit (Ikon Pensil) -->
                                        <a href="{{ route('wawancara.edit', $wawancara->id) }}" title="Edit Data"
                                            class="inline-flex items-center justify-center rounded-lg border border-blue-200 p-2 text-blue-700 transition hover:bg-blue-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Hapus (Ikon Tempat Sampah) -->
                                        <form method="POST" action="{{ route('wawancara.destroy', $wawancara->id) }}"
                                            onsubmit="return confirm('Yakin ingin menghapus data wawancara ini? Tindakan ini tidak dapat dibatalkan.');"
                                            class="inline-flex m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Data"
                                                class="inline-flex items-center justify-center rounded-lg border border-red-200 bg-red-50 p-2 text-red-600 transition hover:bg-red-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="px-6 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div
                                            class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-2xl">
                                            📋
                                        </div>

                                        <h3 class="mt-4 text-base font-bold text-slate-800">
                                            Belum Ada Data Wawancara
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Belum ada wawancara yang telah diisi.
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
            @if ($wawancaras->hasPages())

                <div class="border-t border-slate-200 px-6 py-4">

                    {{ $wawancaras->links() }}

                </div>

            @endif

        </div>

    </div>

    {{-- JAVASCRIPT NOTIFIKASI --}}
    <script>
        function tutupNotifikasi(id) {
            const elemen = document.getElementById(id);

            if (!elemen) return;

            elemen.style.opacity = '0';
            elemen.style.transform = 'translateY(-6px)';

            setTimeout(() => {
                elemen.remove();
            }, 350);
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Hilangkan notifikasi setelah 3 detik.
            ['success', 'info'].forEach(function (jenis) {
                const elemen = document.getElementById('alert-' + jenis);

                if (elemen) {
                    setTimeout(function () {
                        tutupNotifikasi('alert-' + jenis);
                    }, 3000);
                }
            });
        });
    </script>

@endsection