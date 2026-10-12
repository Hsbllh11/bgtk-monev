@extends('layouts.app')

@section('title', 'Data Sekolah')
@section('page-title', 'Data Sekolah')

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Data Sekolah
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola data sekolah yang menjadi objek monitoring dan evaluasi.
                </p>
            </div>

            <a href="{{ route('sekolah.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Sekolah
            </a>
        </div>


        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>

                    <p class="text-sm font-medium text-emerald-800">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        @endif


        {{-- Statistik --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Total --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Total Sekolah
                        </p>

                        <p class="mt-2 text-3xl font-bold text-slate-800">
                            {{ $totalSekolah }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16M9 7h2m-2 4h2m2-4h2m-2 4h2" />
                        </svg>
                    </div>
                </div>
            </div>


            {{-- Sudah Monitor --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Sudah Dimonitor
                        </p>

                        <p class="mt-2 text-3xl font-bold text-emerald-600">
                            {{ $sudahDimonitor }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </div>


            {{-- Belum Monitor --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Belum Dimonitor
                        </p>

                        <p class="mt-2 text-3xl font-bold text-amber-600">
                            {{ $belumDimonitor }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0 3.75h.008v.008H12V16.5zM10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                        </svg>
                    </div>
                </div>
            </div>


            {{-- Wilayah --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Kabupaten/Kota
                        </p>

                        <p class="mt-2 text-3xl font-bold text-purple-600">
                            {{ $wilayah }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-purple-50 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 21s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 10a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>


        {{-- Filter --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="mb-4">
                <h2 class="text-base font-bold text-slate-800">
                    Filter Data Sekolah
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Gunakan filter untuk mencari data sekolah.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">

                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Jenjang
                    </label>

                    <select
                        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                        <option>Semua Jenjang</option>
                        <option>SD</option>
                        <option>SMP</option>
                        <option>SMA</option>
                        <option>SMK</option>
                    </select>
                </div>


                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Kabupaten/Kota
                    </label>

                    <select
                        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                        <option>Semua Wilayah</option>
                        <option>Kota Mataram</option>
                        <option>Lombok Barat</option>
                        <option>Lombok Tengah</option>
                        <option>Lombok Timur</option>
                        <option>Lombok Utara</option>
                        <option>Sumbawa</option>
                        <option>Sumbawa Barat</option>
                        <option>Dompu</option>
                        <option>Bima</option>
                        <option>Kota Bima</option>
                    </select>
                </div>


                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Status Monitoring
                    </label>

                    <select
                        class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                        <option>Semua Status</option>
                        <option>Sudah Dimonitor</option>
                        <option>Belum Dimonitor</option>
                    </select>
                </div>


                <div>
                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Pencarian
                    </label>

                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />
                        </svg>

                        <input type="text" placeholder="Cari sekolah..."
                            class="w-full rounded-lg border border-slate-300 py-2.5 pl-10 pr-3 text-sm text-slate-700 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                    </div>
                </div>

            </div>
        </div>


        {{-- Tabel --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

            <div
                class="flex flex-col gap-2 border-b border-slate-200 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-800">
                        Daftar Sekolah
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Data sekolah yang tersimpan dalam sistem.
                    </p>
                </div>

                <span class="text-sm text-slate-500">
                    Total {{ $totalSekolah }} sekolah
                </span>
            </div>


            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-slate-50">

                        <tr>
                            <th class="px-5 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">
                                No
                            </th>

                            <th class="px-5 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">
                                NPSN
                            </th>

                            <th class="px-5 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">
                                Nama Sekolah
                            </th>

                            <th class="px-5 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">
                                Jenjang
                            </th>

                            <th class="px-5 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">
                                Kabupaten/Kota
                            </th>

                            <th class="px-5 py-3 text-left text-xs font-bold uppercase tracking-wide text-slate-500">
                                Status
                            </th>

                            <th class="px-5 py-3 text-right text-xs font-bold uppercase tracking-wide text-slate-500">
                                Aksi
                            </th>
                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100 bg-white">

                        @forelse ($sekolahs as $index => $sekolah)

                            <tr class="transition hover:bg-slate-50">

                                <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">
                                    {{ $sekolahs->firstItem() + $index }}
                                </td>

                                <td class="whitespace-nowrap px-5 py-4 text-sm font-medium text-slate-700">
                                    {{ $sekolah->npsn }}
                                </td>

                                <td class="px-5 py-4">
                                    <div class="font-semibold text-slate-800">
                                        {{ $sekolah->nama_sekolah }}
                                    </div>

                                    @if($sekolah->kecamatan)
                                        <div class="mt-1 text-xs text-slate-500">
                                            Kec. {{ $sekolah->kecamatan }}
                                        </div>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-5 py-4">
                                    <span class="rounded-md bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                        {{ $sekolah->jenjang }}
                                    </span>
                                </td>

                                <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">
                                    {{ $sekolah->kabupaten_kota }}
                                </td>

                                <td class="whitespace-nowrap px-5 py-4">

                                    @if($sekolah->status_monitoring === 'Sudah Dimonitor')

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Sudah Dimonitor
                                        </span>

                                    @else

                                        <span
                                            class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Belum Dimonitor
                                        </span>

                                    @endif

                                </td>

                                <td class="whitespace-nowrap px-5 py-4 text-right">

                                    <div class="flex justify-end gap-2">

                                        <a href="{{ route('sekolah.show', $sekolah) }}"
                                            class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 transition hover:bg-slate-50">
                                            Detail
                                        </a>

                                        <a href="{{ route('sekolah.edit', $sekolah) }}"
                                            class="rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700 transition hover:bg-blue-100">
                                            Edit
                                        </a>
                                        <form action="{{ route('sekolah.destroy', $sekolah) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data sekolah ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="inline-flex items-center rounded-lg bg-red-50 px-3 py-2 text-sm font-semibold text-red-600 transition hover:bg-red-100">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="px-5 py-16 text-center">

                                    <div class="mx-auto flex max-w-sm flex-col items-center">

                                        <div
                                            class="flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 21h18M5 21V5a2 2 0 012-2h10a2 2 0 012 2v16" />
                                            </svg>
                                        </div>

                                        <h3 class="mt-4 text-base font-bold text-slate-800">
                                            Belum ada data sekolah
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Belum terdapat data sekolah di dalam database.
                                        </p>

                                        <a href="{{ route('sekolah.create') }}"
                                            class="mt-5 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>

                                            Tambah Sekolah
                                        </a>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($sekolahs->hasPages())

                <div class="border-t border-slate-200 px-5 py-4">
                    {{ $sekolahs->links() }}
                </div>

            @endif

        </div>

    </div>

@endsection