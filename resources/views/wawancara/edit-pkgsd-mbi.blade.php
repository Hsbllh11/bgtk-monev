@extends('layouts.app')

@section('title', 'Edit Wawancara PKGSD MBI')
@section('page-title', 'Edit Wawancara PKGSD MBI')

@section('content')
    @php
        $fmt = fn($t) => $t ? \Illuminate\Support\Carbon::parse($t)->format('Y-m-d') : null;

        $values = [
            'nama_petugas_monev' => $wawancara->nama_petugas_monev ?: $wawancara->nama_pewawancara,
            'instansi_petugas' => $metadata['instansi_petugas'] ?? $wawancara->unit_kerja_petugas,
            'lokasi_monev' => $metadata['lokasi_monev'] ?? '',
            'tanggal_pelaksanaan' => $fmt($metadata['tanggal_pelaksanaan'] ?? $wawancara->tanggal_evaluasi),
            'nama_responden' => $wawancara->nama_responden ?: $wawancara->nama_narasumber,
            'jabatan_responden' => $metadata['jabatan_responden'] ?? $wawancara->status_responden,
            'satuan_pendidikan' => $metadata['satuan_pendidikan'] ?? $wawancara->unit_kerja_responden,
            'masa_kerja' => $metadata['masa_kerja'] ?? '',
            'nama_pelatihan' => $metadata['nama_pelatihan'] ?? '',
            'tanggal_wawancara' => $fmt($wawancara->tanggal_wawancara),
        ];

        foreach (array_keys(config('pkgsd_wawancara.pertanyaan')) as $n) {
            $values['jawaban_' . $n] = $wawancara->{'jawaban_' . $n};
        }
    @endphp

    @include('wawancara.partials.form-pkgsd-mbi', [
        'judul' => 'Edit Instrumen Wawancara PKGSD MBI',
        'action' => route('wawancara.update', $wawancara->id),
        'method' => 'PUT',
        'values' => $values,
        'batal' => route('wawancara.show', $wawancara->id),
        'tombol' => 'Simpan Perubahan',
    ])
@endsection