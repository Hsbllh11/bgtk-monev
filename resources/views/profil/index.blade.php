@extends('layouts.app')

@section('title', 'Profil Saya')

@section('page-title', 'Profil Saya')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-800">
            Profil Saya
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Informasi profil pengguna sistem Monitoring dan Evaluasi BGTK Provinsi NTB.
        </p>
    </div>

    {{-- Profil utama --}}
    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        {{-- Cover --}}
        <div class="h-32 bg-gradient-to-r from-blue-700 via-blue-600 to-sky-500">
        </div>

        <div class="px-6 pb-6">

            <div class="-mt-12 flex flex-col gap-5 sm:flex-row sm:items-end">

                {{-- Avatar --}}
                <div class="flex h-24 w-24 shrink-0 items-center justify-center rounded-2xl border-4 border-white bg-blue-100 text-3xl font-bold text-blue-700 shadow-md">
                    H
                </div>

                {{-- Nama --}}
                <div class="pb-1">
                    <h2 class="text-xl font-bold text-slate-800">
                        Hisbullah
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Pengguna Sistem Monev BGTK NTB
                    </p>
                </div>

            </div>

        </div>

    </div>

    {{-- Informasi pengguna --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

        {{-- Data pribadi --}}
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-800">
                    Informasi Pengguna
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi dasar pengguna sistem.
                </p>
            </div>

            <div class="divide-y divide-slate-100">

                <div class="flex flex-col gap-1 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500">
                        Nama Lengkap
                    </span>

                    <span class="text-sm font-semibold text-slate-800">
                        Hisbullah
                    </span>
                </div>

                <div class="flex flex-col gap-1 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500">
                        Username
                    </span>

                    <span class="text-sm font-semibold text-slate-800">
                        hisbullah
                    </span>
                </div>

                <div class="flex flex-col gap-1 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500">
                        Email
                    </span>

                    <span class="text-sm font-semibold text-slate-800">
                        -
                    </span>
                </div>

                <div class="flex flex-col gap-1 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500">
                        Status Akun
                    </span>

                    <span class="inline-flex w-fit items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                        Aktif
                    </span>
                </div>

            </div>

        </div>

        {{-- Informasi sistem --}}
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-6 py-5">
                <h2 class="text-lg font-bold text-slate-800">
                    Informasi Sistem
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi akses dan peran pengguna.
                </p>
            </div>

            <div class="divide-y divide-slate-100">

                <div class="flex flex-col gap-1 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500">
                        Institusi
                    </span>

                    <span class="text-sm font-semibold text-slate-800">
                        BGTK Provinsi NTB
                    </span>
                </div>

                <div class="flex flex-col gap-1 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500">
                        Peran
                    </span>

                    <span class="text-sm font-semibold text-slate-800">
                        Administrator
                    </span>
                </div>

                <div class="flex flex-col gap-1 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500">
                        Akses
                    </span>

                    <span class="text-sm font-semibold text-slate-800">
                        Monitoring & Evaluasi
                    </span>
                </div>

                <div class="flex flex-col gap-1 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-slate-500">
                        Status
                    </span>

                    <span class="inline-flex w-fit items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                        Terdaftar
                    </span>
                </div>

            </div>

        </div>

    </div>

    {{-- Hak akses --}}
    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-200 px-6 py-5">
            <h2 class="text-lg font-bold text-slate-800">
                Hak Akses
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Fitur yang dapat digunakan oleh pengguna.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 p-6 sm:grid-cols-2 lg:grid-cols-4">

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <p class="text-sm font-semibold text-slate-800">
                    Data Sekolah
                </p>

                <p class="mt-1 text-xs text-emerald-600">
                    ✓ Akses penuh
                </p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <p class="text-sm font-semibold text-slate-800">
                    Instrumen
                </p>

                <p class="mt-1 text-xs text-emerald-600">
                    ✓ Akses penuh
                </p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <p class="text-sm font-semibold text-slate-800">
                    Wawancara
                </p>

                <p class="mt-1 text-xs text-emerald-600">
                    ✓ Akses penuh
                </p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                <p class="text-sm font-semibold text-slate-800">
                    Tindak Lanjut
                </p>

                <p class="mt-1 text-xs text-emerald-600">
                    ✓ Akses penuh
                </p>
            </div>

        </div>

    </div>

    {{-- Catatan --}}
    <div class="rounded-2xl border border-blue-200 bg-blue-50 p-5">

        <div class="flex items-start gap-3">

            <div class="mt-0.5 font-bold text-blue-600">
                i
            </div>

            <div>
                <h3 class="text-sm font-bold text-blue-800">
                    Informasi
                </h3>

                <p class="mt-1 text-sm leading-6 text-blue-700">
                    Halaman profil saat ini digunakan sebagai informasi
                    pengguna. Integrasi autentikasi dan pengelolaan akun
                    dapat ditambahkan pada tahap pengembangan berikutnya.
                </p>
            </div>

        </div>

    </div>

</div>

@endsection