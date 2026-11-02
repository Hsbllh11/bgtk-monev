@extends('layouts.app')

@section('title', 'Tambah Akun Petugas')

@section('page-title', 'Tambah Akun Petugas')

@section('content')

    <style>
        /* ===================== TOKEN WARNA (sama dengan Tambah Sekolah) ===================== */
        :root {
            --p-50: #eff4ff;
            --p-100: #dbe7fe;
            --p-200: #bfd4fb;
            --p-500: #3b82f6;
            --p-600: #2563eb;
            --p-700: #1d4ed8;
            --p-800: #1e40af;
            --accent: #f5b82e;
            --ink: #0f1b3d;
            --muted: #64748b;
            --line: #e6ebf5;
        }

        .d-wrap {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .d-form {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .d-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            overflow: hidden;
        }

        .d-card-h {
            font-size: 16px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -.01em;
        }

        .d-card-s {
            margin-top: 2px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .d-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            padding: 20px 20px 14px;
        }

        /* --- judul halaman --- */
        .d-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        @media (max-width: 640px) {
            .d-title-row {
                flex-direction: column;
            }
        }

        .d-h1 {
            font-size: 28px;
            font-weight: 400;
            letter-spacing: -.02em;
            color: var(--ink);
            line-height: 1.2;
        }

        .d-h1 b {
            font-weight: 700;
        }

        .d-crumb {
            margin-top: 4px;
            font-size: 12.5px;
            color: var(--muted);
        }

        .d-crumb a {
            color: inherit;
            transition: color .2s;
        }

        .d-crumb a:hover {
            color: var(--p-600);
        }

        .d-desc {
            margin-top: 10px;
            max-width: 640px;
            font-size: 13px;
            line-height: 1.7;
            color: #475569;
        }

        /* --- tombol pastel --- */
        .d-pbtn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex-shrink: 0;
            height: 46px;
            padding: 0 18px;
            border-radius: 14px;
            background: var(--b-bg);
            border: 1px solid var(--b-line);
            color: var(--b-ink);
            font-family: inherit;
            font-size: 13.5px;
            font-weight: 700;
            cursor: pointer;
            white-space: nowrap;
            text-decoration: none;
            transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
        }

        .d-pbtn:hover {
            transform: translateY(-1px);
            filter: brightness(.97);
            box-shadow: 0 12px 22px -14px var(--b-glow);
        }

        .d-pbtn svg {
            flex-shrink: 0;
            transition: transform .3s ease;
        }

        .d-pbtn.back:hover svg {
            transform: translateX(-3px);
        }

        .b-blue {
            --b-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --b-line: #c6d8fb;
            --b-ink: #1d4ed8;
            --b-glow: rgba(37, 99, 235, .7);
        }

        .b-mint {
            --b-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%);
            --b-line: #bfe8d4;
            --b-ink: #047857;
            --b-glow: rgba(5, 150, 105, .7);
        }

        /* tombol sekunder (Batal) */
        .d-btn-ghost {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 46px;
            padding: 0 18px;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fff;
            color: #475569;
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s, color .2s;
        }

        .d-btn-ghost:hover {
            background: var(--p-50);
            color: var(--p-700);
        }

        .d-foot {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        @media (max-width: 640px) {
            .d-foot {
                flex-direction: column-reverse;
            }
        }

        /* --- notifikasi error --- */
        .d-error {
            padding: 16px 20px;
            border-radius: 16px;
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
        }

        .d-error b {
            font-size: 13px;
            font-weight: 700;
        }

        .d-error ul {
            margin: 8px 0 0 18px;
            list-style: disc;
            font-size: 12.5px;
            line-height: 1.8;
        }

        /* --- form --- */
        .d-form-grid {
            display: grid;
            gap: 18px;
            padding: 6px 20px 22px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-form-grid.c2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .d-form-grid.c3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .d-form-grid .span2 {
                grid-column: 1 / -1;
            }
        }

        .d-label {
            display: block;
            margin-bottom: 8px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-label i {
            color: #e11d48;
            font-style: normal;
        }

        .d-field {
            width: 100%;
            height: 44px;
            padding: 0 14px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            color: #334155;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        textarea.d-field {
            height: auto;
            padding: 12px 14px;
            line-height: 1.7;
            resize: vertical;
        }

        .d-field::placeholder {
            color: #94a3b8;
        }

        .d-field:focus {
            border-color: var(--p-500);
            box-shadow: 0 0 0 4px var(--p-100);
        }

        .d-hint {
            margin-top: 8px;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Tambah <b>Akun Petugas</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('manajemen-akun.index') }}">Daftar akun petugas</a>
                        &nbsp;›&nbsp; Buat akun
                    </p>
                    <p class="d-desc">Lengkapi data berikut untuk membuat akun Petugas Monev baru.</p>
                </div>

                {{-- Kembali --}}
                <a href="{{ route('manajemen-akun.index') }}" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </section>

        {{-- ================= VALIDATION ERROR ================= --}}
        @if ($errors->any())
            <div class="d-error">
                <b>Periksa kembali data berikut:</b>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ================= FORM UTAMA ================= --}}
        <form action="{{ route('manajemen-akun.store') }}" method="POST" class="d-form">

            @csrf

            {{-- INFORMASI AKUN --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Informasi Akun</h2>
                        <p class="d-card-s">Akun baru akan dibuat dengan role Petugas Monev.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">

                    {{-- Nama Petugas --}}
                    <div class="span2">
                        <label for="name" class="d-label">Nama Petugas <i>*</i></label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required maxlength="255"
                            autocomplete="name" placeholder="Masukkan nama petugas" class="d-field">
                    </div>

                    {{-- Username --}}
                    <div>
                        <label for="username" class="d-label">Username <i>*</i></label>
                        <input id="username" name="username" type="text" value="{{ old('username') }}" required
                            maxlength="100" autocomplete="username" placeholder="Contoh: BudiMonev" class="d-field">
                        <p class="d-hint">Gunakan huruf, angka, tanda hubung, atau garis bawah.</p>
                    </div>

                    {{-- NIP --}}
                    <div>
                        <label for="nip" class="d-label">NIP <i>*</i></label>
                        <input id="nip" name="nip" type="text" value="{{ old('nip') }}" required maxlength="30"
                            autocomplete="off" placeholder="Masukkan NIP" class="d-field">
                        <p class="d-hint">NIP disimpan sebagai identitas petugas.</p>
                    </div>

                </div>
            </section>

            {{-- KATA SANDI --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Kata Sandi</h2>
                        <p class="d-card-s">Atur kata sandi untuk login akun petugas.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">

                    {{-- Password --}}
                    <div>
                        <label for="password" class="d-label">Password <i>*</i></label>
                        <input id="password" name="password" type="password" required minlength="8"
                            autocomplete="new-password" placeholder="Minimal 8 karakter" class="d-field">
                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>
                        <label for="password_confirmation" class="d-label">Konfirmasi Password <i>*</i></label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            minlength="8" autocomplete="new-password" placeholder="Ulangi password" class="d-field">
                    </div>

                </div>
            </section>

            {{-- ================= TOMBOL ================= --}}
            <div class="d-foot">
                <button type="submit" class="d-pbtn b-mint">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        <path d="M17 21v-8H7v8M7 3v5h8" />
                    </svg>
                    Simpan Akun
                </button>
            </div>

        </form>

    </div>

@endsection