@extends('layouts.app')

@section('title', 'Lembar Wawancara')
@section('page-title', 'Lembar Wawancara')

@section('content')
    @php
        $kartu = [
            [
                'kode' => 'BCKS',
                'no' => '01',
                'solid' => '#1457f5',
                'soft' => '#eef4ff',
                'border' => '#dbe7ff',
                'text' => '#1d4ed8',
                'aktif' => true,
            ],
            [
                'kode' => 'BK',
                'no' => '02',
                'solid' => '#8b1cf5',
                'soft' => '#f6efff',
                'border' => '#e8d5ff',
                'text' => '#7e22ce',
                'aktif' => false,
            ],
            [
                'kode' => 'TENDIK',
                'no' => '03',
                'solid' => '#059669',
                'soft' => '#ecfdf5',
                'border' => '#c7f0dc',
                'text' => '#047857',
                'aktif' => false,
            ],
            [
                'kode' => 'GEMBIRA',
                'no' => '04',
                'solid' => '#d97706',
                'soft' => '#fffbeb',
                'border' => '#fde68a',
                'text' => '#b45309',
                'aktif' => true,
            ],
            [
                'kode' => 'PKGSD MBI',
                'no' => '05',
                'solid' => '#0891b2',
                'soft' => '#ecfeff',
                'border' => '#a5f3fc',
                'text' => '#0e7490',
                'aktif' => true,
            ],
        ];

        $routeGembiraSiap = \Illuminate\Support\Facades\Route::has('wawancara.gembira.create');
    @endphp

    <div class="w-full space-y-6 pb-8">

        {{-- HEADER --}}
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                Lembar Wawancara
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Kelola lembar wawancara monitoring dan evaluasi.
            </p>
        </div>

        {{-- NOTIFIKASI --}}
        @foreach (['success' => 'emerald', 'info' => 'blue'] as $jenisPesan => $warna)
            @if (session($jenisPesan))
                <div id="alert-{{ $jenisPesan }}" role="alert"
                    class="flex items-center justify-between gap-4 rounded-xl border px-4 py-3 text-sm transition-all duration-300"
                    style="
                                                                                                                        border-color: {{ $warna === 'emerald' ? '#a7f3d0' : '#bfdbfe' }};
                                                                                                                        background: {{ $warna === 'emerald' ? '#ecfdf5' : '#eff6ff' }};
                                                                                                                        color: {{ $warna === 'emerald' ? '#047857' : '#1d4ed8' }};
                                                                                                                    ">
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

        {{-- PILIHAN JENIS WAWANCARA --}}
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-5">
            @foreach ($kartu as $k)
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md">
                    <div style="height: 5px; background: {{ $k['solid'] }}"></div>

                    <div class="p-5">
                        <span class="inline-flex rounded-full border px-3 py-1 text-xs font-semibold" style="
                                                                                                background: {{ $k['soft'] }};
                                                                                                border-color: {{ $k['border'] }};
                                                                                                color: {{ $k['text'] }};
                                                                                            ">
                            Instrumen {{ $k['no'] }}
                        </span>

                        <h2 class="mt-4 text-lg font-bold text-slate-900">
                            @if ($k['kode'] === 'GEMBIRA')
                                Wawancara  GEMBIRA
                            @else
                                Wawancara {{ $k['kode'] }}
                            @endif
                        </h2>

                        <p class="mt-2 min-h-10 text-sm leading-6 text-slate-500">
                            @if ($k['kode'] === 'BCKS')
                                Form wawancara BCKS
                            @elseif ($k['kode'] === 'BK')
                                Form wawancara BK
                            @elseif ($k['kode'] === 'TENDIK')
                                Form wawancara TENDIK
                            @elseif ($k['kode'] === 'PKGSD MBI')
                                Form wawancara PKGSD MBI
                            @else
                                Form wawancara Matematika GEMBIRA
                            @endif
                        </p>
<div class="mt-5">
    @php
        $routeTombol = match ($k['kode']) {
            'BCKS' => 'wawancara.bcks.create',
            'BK' => 'wawancara.bk.create',
            'TENDIK' => 'wawancara.tendik.create',
            'GEMBIRA' => 'wawancara.gembira.create',
            'PKGSD MBI' => 'wawancara.pkgsd-mbi.create',
        };

        $labelTombol = match ($k['kode']) {
            'BCKS' => '+ Isi Wawancara BCKS',
            'BK' => '+ Isi Wawancara BK',
            'TENDIK' => '+ Isi Wawancara TENDIK',
            'GEMBIRA' => '+ Isi Wawancara GEMBIRA',
            'PKGSD MBI' => '+ Isi Wawancara PKGSD MBI',
        };
    @endphp

    <a href="{{ route($routeTombol) }}"
       class="inline-flex w-full items-center justify-center rounded-xl px-4 text-sm font-semibold text-white transition hover:opacity-90"
       style="height: 44px; background: {{ $k['solid'] }};">
        {{ $labelTombol }}
    </a>
</div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- FILTER DAN PENCARIAN --}}
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
                            <option value="GEMBIRA" @selected(request('jenis_instrumen') === 'GEMBIRA')>Wawancara Matematika
                                GEMBIRA</option>
                            <option value="PKGSD MBI" @selected(request('jenis_instrumen') === 'PKGSD MBI')>Wawancara PKGSD MBI</option>
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

        {{-- RIWAYAT WAWANCARA --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-900">Riwayat Wawancara</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Daftar wawancara monitoring dan evaluasi yang telah diisi.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left" style="min-width: 1000px">
                    <thead class="border-b border-slate-200 bg-slate-50">
                        <tr class="text-xs font-bold uppercase tracking-wide text-slate-500">
                            <th class="px-6 py-4">Jenis Wawancara</th>
                            <th class="px-6 py-4">BCKS / Narasumber</th>
                            <th class="px-6 py-4">Responden</th>
                            <th class="px-6 py-4">Tanggal Evaluasi</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($wawancaras as $wawancara)
                            @php
                                $jenisData = strtoupper(trim($wawancara->jenis_wawancara ?? ''));
                                $namaInstrumen = strtoupper($wawancara->instrumen->nama_instrumen ?? '');

                                if ($jenisData === 'BCKS' || str_contains($namaInstrumen, 'BCKS')) {
                                    $labelJenis = 'Wawancara BCKS';
                                    $kodeJenis = 'BCKS';
                                } elseif ($jenisData === 'BK') {
                                    $labelJenis = 'Wawancara BK';
                                    $kodeJenis = 'BK';
                                } elseif ($jenisData === 'TENDIK') {
                                    $labelJenis = 'Wawancara TENDIK';
                                    $kodeJenis = 'TENDIK';
                                } elseif ($jenisData === 'GEMBIRA') {
                                    $labelJenis = 'Wawancara Matematika GEMBIRA';
                                    $kodeJenis = 'GEMBIRA';
                                } elseif ($jenisData === 'PKGSD MBI') {
                                    $labelJenis = 'Wawancara PKGSD MBI';
                                    $kodeJenis = 'PKGSD MBI';
                                } else {
                                    $labelJenis = $wawancara->instrumen->nama_instrumen ?? 'Wawancara Lama';
                                    $kodeJenis = 'LAMA';
                                }

                                $warnaLatarJenis = match ($kodeJenis) {
                                    'BCKS' => '#eef4ff',
                                    'BK' => '#f6efff',
                                    'TENDIK' => '#ecfdf5',
                                    'GEMBIRA' => '#fffbeb',
                                    'PKGSD MBI' => '#ecfeff',
                                    default => '#f1f5f9',
                                };

                                $warnaTeksJenis = match ($kodeJenis) {
                                    'BCKS' => '#1d4ed8',
                                    'BK' => '#7e22ce',
                                    'TENDIK' => '#047857',
                                    'GEMBIRA' => '#b45309',
                                    'PKGSD MBI' => '#0e7490',
                                    default => '#475569',
                                };

                                // Kolom BCKS / Narasumber: nama responden di baris atas,
                                // status/jabatan responden di baris bawah.
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

                            <tr class="transition hover:bg-slate-50">

                                {{-- JENIS --}}
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl"
                                            style="background: #f3f0ff; color: #7c3aed">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M8 3h8l4 4v14H4V3z" />
                                                <path d="M8 3v5h8V3" />
                                                <path d="M8 13h8M8 17h5" />
                                            </svg>
                                        </div>

                                        <div>
                                            <p class="text-sm font-semibold text-slate-900">
                                                {{ $labelJenis }}
                                            </p>
                                            <span class="mt-1 inline-flex rounded-full px-2.5 py-1 text-xs font-medium"
                                                style="background: {{ $warnaLatarJenis }}; color: {{ $warnaTeksJenis }};">
                                                {{ $kodeJenis }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                {{-- BCKS / NARASUMBER --}}
                                <td class="px-6 py-5">
                                    <p class="text-sm font-semibold text-slate-900">{{ $namaBcks }}</p>
                                    @if ($unitBcks !== '-')
                                        <p class="mt-1 text-xs text-slate-500">{{ $unitBcks }}</p>
                                    @endif
                                </td>

                                {{-- RESPONDEN --}}
                                <td class="px-6 py-5">
                                    <p class="text-sm font-semibold text-slate-900">{{ $namaResponden }}</p>
                                    @if ($unitResponden)
                                        <p class="mt-1 text-xs text-slate-500">{{ $unitResponden }}</p>
                                    @endif
                                </td>

                                {{-- TANGGAL --}}
                                <td class="whitespace-nowrap px-6 py-5 text-sm text-slate-700">
                                    {{ $tanggal ? \Illuminate\Support\Carbon::parse($tanggal)->format('d/m/Y') : '-' }}
                                </td>

                                {{-- STATUS --}}
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center gap-2 whitespace-nowrap rounded-full px-3 py-1.5 text-xs font-semibold"
                                        style="
                                                                                                            background: {{ $isSelesai ? '#d1fae5' : '#fef3c7' }};
                                                                                                            color: {{ $isSelesai ? '#047857' : '#b45309' }};
                                                                                                        ">
                                        <span class="h-1.5 w-1.5 rounded-full" style="background: currentColor"></span>
                                        {{ $statusWawancara }}
                                    </span>
                                </td>


                                {{-- AKSI (DISAMAKAN DENGAN MANAJEMEN AKUN) --}}
                                <td class="px-6 py-5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        
                                        <!-- Tombol Detail (Ikon Mata) -->
                                        <a href="{{ route('wawancara.show', $wawancara->id) }}" 
                                           title="Lihat Detail"
                                           class="inline-flex items-center justify-center rounded-lg border border-slate-200 p-2 text-slate-600 transition hover:bg-slate-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Edit (Ikon Pensil) -->
                                        <a href="{{ route('wawancara.edit', $wawancara->id) }}" 
                                           title="Edit Data"
                                           class="inline-flex items-center justify-center rounded-lg border border-blue-200 p-2 text-blue-700 transition hover:bg-blue-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Hapus (Ikon Tempat Sampah) -->
                                        <form method="POST" 
                                              action="{{ route('wawancara.destroy', $wawancara->id) }}"
                                              onsubmit="return confirm('Yakin ingin menghapus data wawancara ini?');"
                                              class="inline-flex m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    title="Hapus Data"
                                                    class="inline-flex items-center justify-center rounded-lg border border-red-200 bg-red-50 p-2 text-red-600 transition hover:bg-red-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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

            {{-- PAGINATION --}}
            @if ($wawancaras->hasPages())
                <div class="border-t border-slate-200 px-6 py-4">
                    {{ $wawancaras->links() }}
                </div>
            @endif
        </div>
    </div>

    {{-- JAVASCRIPT NOTIFIKASI DAN IKON --}}
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

            // Tampilkan ikon Lucide apabila library tersedia.
            if (window.lucide) {
                window.lucide.createIcons();
            }
        });
    </script>
@endsection