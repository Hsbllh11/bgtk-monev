@extends('layouts.app')

@section('title', 'Detail Wawancara PKGSD MBI')
@section('page-title', 'Detail Wawancara PKGSD MBI')

@section('content')
    @php
        $pertanyaan = config('pkgsd_wawancara.pertanyaan');
        $status = $wawancara->status ?: 'Selesai';

        $tgl = fn($t) => $t ? \Illuminate\Support\Carbon::parse($t)->format('d/m/Y') : '-';

        $label = 'text-xs font-semibold uppercase tracking-wide text-slate-400';
        $nilai = 'mt-1 font-semibold text-slate-800';
    @endphp

    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
                    <a href="{{ route('wawancara.index') }}" class="transition hover:text-blue-600">Lembar Wawancara</a>
                    <span>/</span>
                    <span>Hasil Wawancara PKGSD MBI</span>
                </div>

                <h1 class="mt-1 text-2xl font-bold text-slate-800">Detail Wawancara PKGSD MBI</h1>
                <p class="mt-1 text-sm text-slate-500">
                    Hasil wawancara evaluasi pelatihan PKGSD MBI.
                </p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('wawancara.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50">
                    Kembali
                </a>
                <a href="{{ route('wawancara.cetak', $wawancara->id) }}"
                    class="inline-flex h-12 items-center justify-center rounded-xl px-6 text-sm font-semibold text-white shadow-sm transition"
                    style="background-color: #f97316;" onmouseover="this.style.backgroundColor='#ea580c'"
                    onmouseout="this.style.backgroundColor='#f97316'">
                    Cetak Hasil</a>
                <a href="{{ route('wawancara.edit', $wawancara->id) }}"
                    class="inline-flex h-12 items-center justify-center rounded-xl px-6 text-sm font-semibold text-white shadow-sm transition"
                    style="background-color: #141be8;" onmouseover="this.style.backgroundColor='#0d13cb'"
                    onmouseout="this.style.backgroundColor='#141be8'">
                    Edit Data</a>
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- A --}}
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-900">A. Identitas Petugas Monev</h2>
                <p class="mt-1 text-sm text-slate-500">Identitas petugas yang melakukan monitoring dan evaluasi.</p>
            </div>

            <div class="grid grid-cols-1 gap-x-8 gap-y-5 p-6 md:grid-cols-2">
                <div>
                    <p class="{{ $label }}">Nama Petugas Monev</p>
                    <p class="{{ $nilai }}">{{ $wawancara->nama_petugas_monev ?: $wawancara->nama_pewawancara ?: '-' }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Instansi Petugas</p>
                    <p class="{{ $nilai }}">{{ $metadata['instansi_petugas'] ?? $wawancara->unit_kerja_petugas ?? '-' }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Lokasi Monev</p>
                    <p class="{{ $nilai }}">{{ $metadata['lokasi_monev'] ?? '-' }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Tanggal Pelaksanaan</p>
                    <p class="{{ $nilai }}">{{ $tgl($metadata['tanggal_pelaksanaan'] ?? $wawancara->tanggal_evaluasi) }}</p>
                </div>
            </div>
        </div>

        {{-- B --}}
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-900">B. Identitas Responden</h2>
                <p class="mt-1 text-sm text-slate-500">Identitas responden yang diwawancarai.</p>
            </div>

            <div class="grid grid-cols-1 gap-x-8 gap-y-5 p-6 md:grid-cols-2">
                <div>
                    <p class="{{ $label }}">Nama Responden</p>
                    <p class="{{ $nilai }}">{{ $wawancara->nama_responden ?: $wawancara->nama_narasumber ?: '-' }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Jabatan</p>
                    <p class="{{ $nilai }}">{{ $metadata['jabatan_responden'] ?? $wawancara->status_responden ?? '-' }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Satuan Pendidikan</p>
                    <p class="{{ $nilai }}">{{ $metadata['satuan_pendidikan'] ?? $wawancara->unit_kerja_responden ?? '-' }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Masa Kerja (tahun)</p>
                    <p class="{{ $nilai }}">{{ isset($metadata['masa_kerja']) ? $metadata['masa_kerja'] . ' tahun' : '-' }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Nama Kegiatan/Pelatihan</p>
                    <p class="{{ $nilai }}">{{ $metadata['nama_pelatihan'] ?? '-' }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Tanggal Pengisian</p>
                    <p class="{{ $nilai }}">{{ $tgl($wawancara->tanggal_wawancara) }}</p>
                </div>
                <div>
                    <p class="{{ $label }}">Status</p>
                    <p class="mt-1 font-semibold {{ $status === 'Selesai' ? 'text-emerald-700' : 'text-amber-700' }}">
                        {{ $status }}
                    </p>
                </div>
            </div>
        </div>

        {{-- C --}}
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 px-6 py-5">
                <h2 class="font-bold text-slate-800">C. Hasil Wawancara Terbuka</h2>
                <p class="mt-1 text-sm text-slate-500">Jawaban responden berdasarkan pengalaman setelah pelatihan.</p>
            </div>

            <div class="space-y-6 p-6">
                @foreach ($pertanyaan as $nomor => $teks)
                    <div>
                        <h3 class="font-semibold text-slate-800">{{ $nomor }}. {{ $teks }}</h3>

                        <div class="mt-3 rounded-xl border border-slate-200 bg-slate-50 p-4">
                            @if ($wawancara->{'jawaban_' . $nomor})
                                <p class="whitespace-pre-line break-words text-sm leading-7 text-slate-700">{{ $wawancara->{'jawaban_' . $nomor} }}</p>
                            @else
                                <p class="text-sm italic text-slate-400">Belum ada jawaban.</p>
                            @endif
                        </div>
                    </div>

                    @if (!$loop->last)
                        <div class="border-t border-slate-100"></div>
                    @endif
                @endforeach
            </div>
        </section>

        @if ($wawancara->tindakLanjut)
            <section class="rounded-2xl border border-blue-200 bg-blue-50 p-6">
                <h2 class="font-bold text-blue-900">Tindak Lanjut Terkait</h2>
                <p class="mt-2 text-sm text-blue-800">{{ $wawancara->tindakLanjut->judul_tindak_lanjut }}</p>
                <p class="mt-1 text-sm text-blue-700">{{ $wawancara->tindakLanjut->status }}</p>
            </section>
        @endif
    </div>
@endsection