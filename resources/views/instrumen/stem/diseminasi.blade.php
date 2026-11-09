@extends('layouts.app')

@section('title', 'Instrumen STEM - Diseminasi')
@section('page-title', 'Instrumen STEM - Diseminasi')

@section('content')
<div class="space-y-6">
    <div>
        <div class="flex items-center gap-2 text-sm text-slate-500 mb-2">
            <a href="{{ route('instrumen.index') }}" class="hover:text-blue-600 transition">Instrumen Pemantauan</a>
            <span>/</span>
            <a href="{{ route('instrumen.stem.index') }}" class="hover:text-blue-600 transition">Instrumen STEM</a>
            <span>/</span>
            <span class="text-slate-700">Diseminasi</span>
        </div>
        <h1 class="text-2xl font-bold text-slate-800">Diseminasi</h1>
        <p class="mt-1 text-sm text-slate-500">Pilih instrumen Diseminasi yang ingin diisi.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card 1: Instrumen Monitoring dan Evaluasi Diseminasi -->
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <h3 class="text-lg font-bold text-slate-800">Instrumen Monitoring dan Evaluasi Diseminasi</h3>
            <p class="text-sm text-slate-500 mt-2 mb-4">Diisi oleh Tim BGTK NTB (Internal).</p>
            <a href="#" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                Isi Instrumen
            </a>
        </div>

        <!-- Card 2: Instrumen Reaction -->
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <h3 class="text-lg font-bold text-slate-800">Instrumen Reaction</h3>
            <p class="text-sm text-slate-500 mt-2 mb-4">Diisi oleh Peserta Diseminasi.</p>
            <a href="#" class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                Isi Instrumen
            </a>
        </div>
    </div>
</div>
@endsection