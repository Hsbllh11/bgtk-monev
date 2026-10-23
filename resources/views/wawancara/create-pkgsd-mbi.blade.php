@extends('layouts.app')

@section('title', 'Pengisian Wawancara PKGSD MBI')
@section('page-title', 'Pengisian Wawancara PKGSD MBI')

@section('content')
    @include('wawancara.partials.form-pkgsd-mbi', [
        'judul' => 'Instrumen Wawancara PKGSD MBI',
        'action' => route('wawancara.pkgsd-mbi.store'),
        'method' => 'POST',
        'values' => [],
        'batal' => route('wawancara.index'),
        'tombol' => 'Simpan Wawancara',
    ])
@endsection