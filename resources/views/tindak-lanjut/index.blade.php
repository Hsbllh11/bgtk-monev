@extends('layouts.app')

@section('title', 'Rencana Tindak Lanjut')

@section('page-title', 'Rencana Tindak Lanjut')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Rencana Tindak Lanjut
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Kelola rencana tindak lanjut hasil monitoring dan evaluasi.
            </p>
        </div>

        <a
            href="{{ route('tindak-lanjut.create') }}"
            class="inline-flex w-fit items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700"
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
                    d="M12 4v16m8-8H4"
                />
            </svg>

            Tambah Tindak Lanjut
        </a>

    </div>


    {{-- Statistik --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Total --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Total RTL
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-800">
                        {{ $totalTindakLanjut }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-50 text-blue-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5h6"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- Belum Dimulai --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Belum Dimulai
                    </p>

                    <p class="mt-2 text-3xl font-bold text-amber-600">
                        {{ $belumDimulai }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-amber-50 text-amber-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- Dalam Proses --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Dalam Proses
                    </p>

                    <p class="mt-2 text-3xl font-bold text-blue-600">
                        {{ $dalamProses }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-blue-50 text-blue-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M13 10V3L4 14h7v7l9-11h-7z"
                        />
                    </svg>

                </div>

            </div>

        </div>


        {{-- Selesai --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm font-medium text-slate-500">
                        Selesai
                    </p>

                    <p class="mt-2 text-3xl font-bold text-emerald-600">
                        {{ $selesai }}
                    </p>
                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
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

                </div>

            </div>

        </div>

    </div>


    {{-- Notifikasi --}}
    @if(session('success'))

        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4">

            <div class="flex items-center gap-3">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-emerald-600"
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

                <p class="text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    {{-- Tabel --}}
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 px-6 py-5">

            <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">

                <div>
                    <h2 class="text-base font-bold text-slate-800">
                        Daftar Rencana Tindak Lanjut
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Data RTL yang tersimpan dalam sistem.
                    </p>
                </div>

                <span class="text-sm text-slate-500">
                    {{ $tindakLanjuts->total() }} data
                </span>

            </div>

        </div>


        @if($tindakLanjuts->count())

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                No
                            </th>

                            <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Tindak Lanjut
                            </th>

                            <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Sekolah
                            </th>

                            <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Penanggung Jawab
                            </th>

                            <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Target
                            </th>

                            <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Status
                            </th>

                            <th class="whitespace-nowrap px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100 bg-white">

                        @foreach($tindakLanjuts as $index => $tindakLanjut)

                            <tr class="transition hover:bg-slate-50">

                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-500">
                                    {{ $tindakLanjuts->firstItem() + $index }}
                                </td>


                                {{-- Judul --}}
                                <td class="min-w-[250px] px-6 py-4">

                                    <p class="font-semibold text-slate-800">
                                        {{ $tindakLanjut->judul_tindak_lanjut }}
                                    </p>

                                    @if($tindakLanjut->wawancara)
                                        <p class="mt-1 text-xs text-slate-500">
                                            Wawancara:
                                            {{ $tindakLanjut->wawancara->tanggal_wawancara?->format('d/m/Y') }}
                                        </p>
                                    @endif

                                </td>


                                {{-- Sekolah --}}
                                <td class="min-w-[200px] px-6 py-4">

                                    <p class="text-sm font-medium text-slate-700">
                                        {{ $tindakLanjut->sekolah->nama_sekolah ?? '-' }}
                                    </p>

                                    @if($tindakLanjut->sekolah)
                                        <p class="mt-1 text-xs text-slate-500">
                                            NPSN:
                                            {{ $tindakLanjut->sekolah->npsn }}
                                        </p>
                                    @endif

                                </td>


                                {{-- Penanggung Jawab --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-700">
                                    {{ $tindakLanjut->penanggung_jawab }}
                                </td>


                                {{-- Target --}}
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">

                                    {{ $tindakLanjut->target_selesai?->format('d/m/Y') ?? '-' }}

                                </td>


                                {{-- Status --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    @if($tindakLanjut->status === 'Selesai')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                            Selesai

                                        </span>

                                    @elseif($tindakLanjut->status === 'Dalam Proses')

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>

                                            Dalam Proses

                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>

                                            Belum Dimulai

                                        </span>

                                    @endif

                                </td>


                                {{-- Aksi --}}
                                <td class="whitespace-nowrap px-6 py-4 text-right">

                                    <div class="flex items-center justify-end gap-2">

                                        <a
                                            href="{{ route('tindak-lanjut.show', ['tindakLanjut' => $tindakLanjut->id]) }}"
                                            class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-50"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('tindak-lanjut.edit', ['tindakLanjut' => $tindakLanjut->id]) }}"
                                            class="rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('tindak-lanjut.destroy', ['tindakLanjut' => $tindakLanjut->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data tindak lanjut ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($tindakLanjuts->hasPages())

                <div class="border-t border-slate-200 px-6 py-4">

                    {{ $tindakLanjuts->links() }}

                </div>

            @endif

        @else

            {{-- Empty State --}}
            <div class="px-6 py-16 text-center">

                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-slate-100">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 text-slate-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"
                        />
                    </svg>

                </div>

                <h3 class="mt-4 text-base font-bold text-slate-800">
                    Belum ada data tindak lanjut
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm text-slate-500">
                    Belum terdapat rencana tindak lanjut yang tersimpan.
                    Silakan tambahkan data RTL untuk memulai pemantauan.
                </p>

                <a
                    href="{{ route('tindak-lanjut.create') }}"
                    class="mt-5 inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700"
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
                            d="M12 4v16m8-8H4"
                        />
                    </svg>

                    Tambah Tindak Lanjut
                </a>

            </div>

        @endif

    </div>

</div>

@endsection