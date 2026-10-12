```blade
@extends('layouts.app')

@section('title', 'Detail Wawancara')
@section('page-title', 'Detail Wawancara')

@section('content')

@php
    $pertanyaanEsai = [
        [
            'nomor' => 1,
            'judul' => 'Dampak Implementasi RPTKS',
            'pertanyaan' => 'Dari seluruh RPTKS (Rancangan Projek Integratif dan Transformatif Kepala Sekolah) yang Anda susun setelah pelatihan, apakah berdampak setelah diimplementasikan di sekolah? Apa kunci keberhasilannya?',
            'kolom' => 'jawaban_1',
        ],
        [
            'nomor' => 2,
            'judul' => 'Kendala dan Strategi Mitigasi',
            'pertanyaan' => 'Kendala (sistem, anggaran, maupun resistensi SDM) apa yang Anda hadapi saat menerapkan Rancangan Projek tersebut? Bagaimana Anda mengatasinya?',
            'kolom' => 'jawaban_2',
        ],
        [
            'nomor' => 3,
            'judul' => 'Perubahan Kepemimpinan dan Pengambilan Keputusan',
            'pertanyaan' => 'Bagaimana Anda merasakan perubahan pada cara Anda mengambil keputusan strategis dan mengelola konflik di sekolah setelah mengikuti pelatihan BCKS?',
            'kolom' => 'jawaban_3',
        ],
        [
            'nomor' => 4,
            'judul' => 'Dukungan Lingkungan Sekolah',
            'pertanyaan' => 'Sejauh mana dukungan dari Kepala Sekolah (saat ini), rekan guru, dan pengawas sekolah membantu Anda mengeksekusi ide-ide baru di sekolah?',
            'kolom' => 'jawaban_4',
        ],
        [
            'nomor' => 5,
            'judul' => 'Keberlanjutan Program Inovasi',
            'pertanyaan' => 'Bagaimana cara Anda memastikan program inovasi yang telah dimulai tetap berjalan berkelanjutan meskipun terjadi pergantian kepemimpinan atau personil?',
            'kolom' => 'jawaban_5',
        ],
    ];
@endphp

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm font-semibold text-blue-700">Lembar Wawancara</p>
            <h1 class="mt-1 text-2xl font-bold text-slate-800">
                Detail Wawancara
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Informasi kegiatan, narasumber, dan hasil wawancara.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('wawancara.edit', ['wawancara' => $wawancara->id]) }}"
               class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M16.862 4.487l2.651 2.651M8 16l8.862-8.862a1.875 1.875 0 012.651 2.651L10.651 18.65 7 20l1-3.5z"/>
                </svg>
                Edit
            </a>

            <a href="{{ route('wawancara.index') }}"
               class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- INFORMASI UTAMA --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- INFORMASI KEGIATAN --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-2">
            <div class="border-b border-slate-100 px-6 py-5">
                <h2 class="font-bold text-slate-800">Informasi Wawancara</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Data dasar pelaksanaan wawancara.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Instrumen
                    </p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $wawancara->instrumen->nama_instrumen ?? '-' }}
                    </p>
                    @if($wawancara->instrumen)
                        <p class="mt-1 text-sm text-slate-500">
                            Kode: {{ $wawancara->instrumen->kode_instrumen ?? '-' }}
                        </p>
                    @endif
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Sekolah
                    </p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $wawancara->sekolah->nama_sekolah ?? '-' }}
                    </p>
                    @if($wawancara->sekolah)
                        <p class="mt-1 text-sm text-slate-500">
                            NPSN: {{ $wawancara->sekolah->npsn ?? '-' }}
                        </p>
                    @endif
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Tanggal Wawancara
                    </p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $wawancara->tanggal_wawancara?->format('d F Y') ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Status
                    </p>
                    <div class="mt-2">
                        @if($wawancara->status === 'Selesai')
                            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Selesai
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                Belum Dilaksanakan
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        {{-- INFORMASI NARASUMBER --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 px-6 py-5">
                <h2 class="font-bold text-slate-800">Narasumber</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Identitas pihak yang diwawancarai.
                </p>
            </div>

            <div class="space-y-5 p-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Nama Narasumber
                    </p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $wawancara->nama_narasumber ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Jabatan
                    </p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $wawancara->jabatan_narasumber ?: '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Pewawancara
                    </p>
                    <p class="mt-1 font-semibold text-slate-800">
                        {{ $wawancara->nama_pewawancara ?: '-' }}
                    </p>
                </div>
            </div>
        </section>
    </div>

    {{-- JAWABAN ESAI BCKS --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-6 py-5">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.8"
                              d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-slate-800">Jawaban Esai Wawancara BCKS</h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Jawaban narasumber untuk setiap pertanyaan.
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-6 p-6">
            @foreach($pertanyaanEsai as $item)
                <div>
                    <div class="flex items-start gap-3">
                        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-sm font-bold text-blue-700">
                            {{ $item['nomor'] }}
                        </span>
                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-slate-800">
                                {{ $item['judul'] }}
                            </h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                {{ $item['pertanyaan'] }}
                            </p>

                            <div class="mt-3 rounded-xl border border-slate-200 bg-slate-50 p-4">
                                @if($wawancara->{$item['kolom']})
                                    <p class="whitespace-pre-line text-sm leading-7 text-slate-700">{{ $wawancara->{$item['kolom']} }}</p>
                                @else
                                    <p class="text-sm italic text-slate-400">
                                        Belum ada jawaban untuk pertanyaan ini.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if(!$loop->last)
                    <div class="border-t border-slate-100"></div>
                @endif
            @endforeach
        </div>
    </section>

    {{-- RINGKASAN HASIL --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-6 py-5">
            <h2 class="font-bold text-slate-800">Ringkasan Hasil Wawancara</h2>
            <p class="mt-1 text-sm text-slate-500">
                Ringkasan umum di luar jawaban setiap pertanyaan.
            </p>
        </div>

        <div class="p-6">
            @if($wawancara->hasil_wawancara)
                <div class="whitespace-pre-line rounded-xl bg-slate-50 p-5 text-sm leading-7 text-slate-700">{{ $wawancara->hasil_wawancara }}</div>
            @else
                <div class="rounded-xl border border-dashed border-slate-300 p-6 text-center">
                    <p class="text-sm text-slate-500">
                        Belum terdapat ringkasan hasil wawancara.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- CATATAN --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-6 py-5">
            <h2 class="font-bold text-slate-800">Catatan Pewawancara</h2>
            <p class="mt-1 text-sm text-slate-500">
                Catatan tambahan terkait pelaksanaan wawancara.
            </p>
        </div>

        <div class="p-6">
            @if($wawancara->catatan)
                <div class="whitespace-pre-line rounded-xl bg-amber-50 p-5 text-sm leading-7 text-slate-700">{{ $wawancara->catatan }}</div>
            @else
                <div class="rounded-xl border border-dashed border-slate-300 p-6 text-center">
                    <p class="text-sm text-slate-500">
                        Tidak terdapat catatan tambahan.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- TOMBOL AKSI --}}
    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
        <form action="{{ route('wawancara.destroy', ['wawancara' => $wawancara->id]) }}"
              method="POST"
              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data wawancara ini?')">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="inline-flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100">
                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14"/>
                </svg>
                Hapus Data
            </button>
        </form>

        <a href="{{ route('wawancara.edit', ['wawancara' => $wawancara->id]) }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700">
            Edit Data
        </a>
    </div>

</div>

@endsection
