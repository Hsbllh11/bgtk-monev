@extends('layouts.app')

@section('title', 'Wawancara Matematika GEMBIRA')
@section('page-title', 'Wawancara Matematika GEMBIRA')

@section('content')
    @php
        $routeSimpanSiap = \Illuminate\Support\Facades\Route::has('wawancara.gembira.store');

        /*
         * Daftar pertanyaan. 'tipe':
         *  - 'tanya'  : pertanyaan biasa
         *  - 'grup'   : judul pertanyaan bertingkat (tanpa kolom jawaban)
         *  - 'sub'    : sub pertanyaan di bawah grup
         */
        $pertanyaan = [
            [
                'tipe' => 'tanya',
                'nama' => 'jawaban_1',
                'no' => '1',
                'rows' => 4,
                'teks' => 'Bagaimana pengalaman Anda selama mengikuti Pelatihan Matematika Gembira?'
            ],
            [
                'tipe' => 'tanya',
                'nama' => 'jawaban_2',
                'no' => '2',
                'rows' => 4,
                'teks' => 'Kendala apa yang Anda alami selama mengikuti pelatihan?'
            ],
            [
                'tipe' => 'tanya',
                'nama' => 'jawaban_3',
                'no' => '3',
                'rows' => 4,
                'teks' => 'Bagaimana pemahaman Anda tentang pembelajaran matematika berubah setelah mengikuti pelatihan?'
            ],
            [
                'tipe' => 'tanya',
                'nama' => 'jawaban_4',
                'no' => '4',
                'rows' => 4,
                'teks' => 'Ceritakan contoh konkret kegiatan pembelajaran matematika yang telah Anda lakukan dengan menerapkan hasil pelatihan!'
            ],

            [
                'tipe' => 'grup',
                'no' => '5',
                'teks' => 'Perubahan apa yang Anda amati setelah penerapan Matematika Gembira?',
                'catatan' => 'Jelaskan masing-masing aspek berikut.'
            ],
            [
                'tipe' => 'sub',
                'nama' => 'jawaban_5_a',
                'no' => 'a',
                'rows' => 3,
                'teks' => 'Keterlibatan dan keaktifan peserta didik'
            ],
            [
                'tipe' => 'sub',
                'nama' => 'jawaban_5_b',
                'no' => 'b',
                'rows' => 3,
                'teks' => 'Motivasi dan rasa percaya diri'
            ],
            [
                'tipe' => 'sub',
                'nama' => 'jawaban_5_c',
                'no' => 'c',
                'rows' => 3,
                'teks' => 'Pemahaman konsep'
            ],
            [
                'tipe' => 'sub',
                'nama' => 'jawaban_5_d',
                'no' => 'd',
                'rows' => 3,
                'teks' => 'Kemampuan pemecahan masalah'
            ],
            [
                'tipe' => 'sub',
                'nama' => 'jawaban_5_e',
                'no' => 'e',
                'rows' => 3,
                'teks' => 'Komunikasi dan kolaborasi'
            ],

            [
                'tipe' => 'tanya',
                'nama' => 'jawaban_6',
                'no' => '6',
                'rows' => 4,
                'teks' => 'Apakah ada peningkatan kemampuan numerasi murid setelah penerapan Matematika GEMBIRA? Jika ada, jelaskan!'
            ],
            [
                'tipe' => 'tanya',
                'nama' => 'jawaban_7',
                'no' => '7',
                'rows' => 4,
                'teks' => 'Berikan saran dan masukan untuk pelatihan Matematika GEMBIRA?'
            ],
        ];

        $jumlahJawaban = collect($pertanyaan)->where('tipe', '!=', 'grup')->count();
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan Instrumen BCKS) ===================== */
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

        .d-pbtn:disabled {
            cursor: not-allowed;
            opacity: .6;
            transform: none;
            filter: none;
            box-shadow: none;
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

        .d-foot {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 12px;
        }

        /* --- info panduan + progres --- */
        .d-info-card {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 1024px) {
            .d-info-card {
                grid-template-columns: minmax(0, 1fr) 280px;
            }
        }

        .d-info-main {
            padding: 22px;
            border-left: 4px solid var(--p-600);
        }

        .d-info-head {
            display: flex;
            align-items: flex-start;
            gap: 14px;
        }

        .d-info-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 14px;
            background: var(--p-50);
            color: var(--p-600);
        }

        .d-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-top: 18px;
            padding: 12px 14px;
            border: 1px dashed var(--p-200);
            border-radius: 14px;
            background: #f5f8ff;
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
        }

        .d-note b.t {
            display: block;
            font-weight: 700;
            color: var(--p-700);
        }

        .d-prog {
            padding: 22px;
            border-top: 1px solid var(--line);
            background: #f9fbff;
        }

        @media (min-width: 1024px) {
            .d-prog {
                border-top: 0;
                border-left: 1px solid var(--line);
            }
        }

        .d-prog-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .d-prog-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
        }

        .d-prog-pct {
            font-size: 12px;
            font-weight: 800;
            color: var(--p-600);
        }

        .d-bar {
            height: 8px;
            margin-top: 10px;
            overflow: hidden;
            border-radius: 9999px;
            background: #e6ebf5;
        }

        .d-bar>div {
            height: 100%;
            border-radius: 9999px;
            background: var(--p-600);
            transition: width .3s ease;
        }

        .d-prog-val {
            font-size: 14px;
            font-weight: 800;
            color: var(--ink);
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

        .d-warn {
            padding: 14px 18px;
            border-radius: 16px;
            background: #fff9e6;
            border: 1px solid #f6dd9b;
            color: #92400e;
            font-size: 12.5px;
            line-height: 1.7;
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

        .d-err {
            margin-top: 6px;
            font-size: 12px;
            color: #e11d48;
        }

        /* --- badge --- */
        .d-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 11.5px;
            font-weight: 700;
            text-align: center;
            white-space: nowrap;
        }

        /* --- pertanyaan wawancara --- */
        .d-q-item {
            padding: 20px;
            border-top: 1px solid var(--line);
        }

        .d-q-item:first-child {
            border-top: 0;
        }

        .d-q-item.sub {
            padding-left: 62px;
            border-top-style: dashed;
        }

        @media (max-width: 640px) {
            .d-q-item.sub {
                padding-left: 20px;
            }
        }

        .d-q-head {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .d-q-no {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 30px;
            height: 30px;
            border-radius: 10px;
            background: var(--p-50);
            color: var(--p-700);
            font-size: 13px;
            font-weight: 800;
        }

        .d-q-no.sub {
            width: 26px;
            height: 26px;
            border-radius: 8px;
            background: #f1f5f9;
            color: #475569;
            font-size: 12px;
        }

        .d-q-text {
            font-size: 13.5px;
            font-weight: 600;
            line-height: 1.7;
            color: var(--ink);
            padding-top: 3px;
        }

        .d-q-text i {
            color: #e11d48;
            font-style: normal;
        }

        .d-q-item textarea.d-field {
            margin-top: 14px;
        }

        .d-q-group {
            padding: 16px 20px;
            border-top: 1px solid var(--line);
            background: #fffaea;
        }

        .d-q-group .d-q-no {
            background: #fef3c7;
            color: #b45309;
        }

        .d-q-group-note {
            margin-top: 2px;
            font-size: 12.5px;
            color: #78350f;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Wawancara <b>Matematika GEMBIRA</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('wawancara.index') }}">Wawancara</a>
                        &nbsp;›&nbsp; Wawancara Matematika GEMBIRA
                    </p>
                    <p class="d-desc">
                        Lengkapi biodata sesuai instrumen Monitoring dan Evaluasi Matematika GEMBIRA.
                    </p>
                </div>

                {{-- Kembali --}}
                <a href="{{ route('wawancara.index') }}" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </section>

        {{-- ================= PANDUAN & PROGRES ================= --}}
        <div class="d-card">
            <div class="d-info-card">

                {{-- Panduan --}}
                <div class="d-info-main">
                    <div class="d-info-head">
                        <div class="d-info-ico">
                            <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>

                        <div style="min-width:0">
                            <h2 class="d-card-h">Instrumen Wawancara Matematika GEMBIRA</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Instrumen ini digunakan untuk menggali pengalaman, kendala, dan dampak penerapan
                                pelatihan Matematika GEMBIRA melalui wawancara.
                            </p>
                        </div>
                    </div>

                    <div class="d-note">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                            <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>

                        <div>
                            <b class="t">Petunjuk pengisian</b>
                            Jawablah pertanyaan berdasarkan pengalaman dan bukti yang tersedia. Tanda bintang (*)
                            menunjukkan kolom wajib diisi.
                        </div>
                    </div>
                </div>

                {{-- Progres pengisian --}}
                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres pengisian</span>
                        <span id="wawancara-progress-percent" class="d-prog-pct">0%</span>
                    </div>

                    <div class="d-bar">
                        <div id="wawancara-progress-bar" style="width: 0%"></div>
                    </div>

                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="wawancara-progress-text" class="d-prog-val">0 / {{ $jumlahJawaban }} jawaban</span>
                        <span class="d-prog-label" style="font-weight:500">Wawancara</span>
                    </div>
                </div>

            </div>
        </div>

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

        @unless ($routeSimpanSiap)
            <div class="d-warn">
                Route penyimpanan <b>wawancara.gembira.store</b> belum tersedia, sehingga tombol simpan dinonaktifkan.
            </div>
        @endunless

        {{-- ================= FORM UTAMA ================= --}}
        <form action="{{ $routeSimpanSiap ? route('wawancara.gembira.store') : '#' }}" method="POST" class="d-form">

            @csrf

            {{-- A. IDENTITAS GURU DAN SEKOLAH --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Guru dan Sekolah</h2>
                        <p class="d-card-s">Isikan identitas guru dan sekolah yang dimonitor.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    <div>
                        <label for="nama_guru" class="d-label">Nama Guru <i>*</i></label>
                        <input id="nama_guru" name="nama_guru" type="text" value="{{ old('nama_guru') }}" required
                            placeholder="Masukkan nama guru" class="d-field">
                        @error('nama_guru')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_sekolah" class="d-label">Nama Sekolah <i>*</i></label>
                        <input id="nama_sekolah" name="nama_sekolah" type="text" value="{{ old('nama_sekolah') }}" required
                            placeholder="Masukkan nama sekolah" class="d-field">
                        @error('nama_sekolah')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kelas_fase" class="d-label">Kelas / Fase</label>
                        <input id="kelas_fase" name="kelas_fase" type="text" value="{{ old('kelas_fase') }}"
                            placeholder="Contoh: Kelas IV / Fase B" class="d-field">
                        @error('kelas_fase')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="topik_materi" class="d-label">Topik / Materi</label>
                        <input id="topik_materi" name="topik_materi" type="text" value="{{ old('topik_materi') }}"
                            placeholder="Masukkan topik atau materi" class="d-field">
                        @error('topik_materi')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- B. IDENTITAS RESPONDEN DAN PETUGAS MONEV --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Identitas Responden dan Petugas Monev</h2>
                        <p class="d-card-s">Tanda bintang (*) menunjukkan kolom wajib diisi.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    <div>
                        <label for="nama_petugas_monev" class="d-label">Nama Petugas Monev <i>*</i></label>
                        <input id="nama_petugas_monev" name="nama_petugas_monev" type="text"
                            value="{{ old('nama_petugas_monev') }}" required placeholder="Masukkan nama petugas"
                            class="d-field">
                        @error('nama_petugas_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jabatan_penilai" class="d-label">Jabatan Penilai <i>*</i></label>

                        <select id="jabatan_penilai" name="jabatan_penilai" required class="d-field">
                            <option value="">Pilih jabatan penilai</option>

                            <option value="Peserta Matematika GEMBIRA" @selected(old('jabatan_penilai') === 'Peserta Matematika GEMBIRA')>
                                Peserta Matematika GEMBIRA
                            </option>

                            <option value="Rekan sejawat" @selected(old('jabatan_penilai') === 'Rekan sejawat')>
                                Rekan sejawat
                            </option>

                            <option value="Atasan langsung/Kepala Sekolah" @selected(old('jabatan_penilai') === 'Atasan langsung/Kepala Sekolah')>
                                Atasan langsung/Kepala Sekolah
                            </option>
                        </select>

                        @error('jabatan_penilai')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_monev" class="d-label">Tanggal Monev <i>*</i></label>
                        <input id="tanggal_monev" name="tanggal_monev" type="date"
                            value="{{ old('tanggal_monev', now()->format('Y-m-d')) }}" required class="d-field">
                        @error('tanggal_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sumber_data_bukti" class="d-label">Sumber Data / Bukti</label>
                        <textarea id="sumber_data_bukti" name="sumber_data_bukti" rows="3"
                            placeholder="Tuliskan sumber data atau dokumen pendukung"
                            class="d-field">{{ old('sumber_data_bukti') }}</textarea>
                        @error('sumber_data_bukti')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- C. PERTANYAAN WAWANCARA TERBUKA --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">C. Pertanyaan Wawancara Terbuka</h2>
                        <p class="d-card-s">Jawablah pertanyaan berdasarkan pengalaman dan bukti yang tersedia.</p>
                    </div>

                    <span class="d-badge" style="background:#fef3c7;color:#b45309">{{ $jumlahJawaban }} jawaban</span>
                </div>

                <div>
                    @foreach ($pertanyaan as $item)

                        @if ($item['tipe'] === 'grup')
                            {{-- Judul pertanyaan bertingkat --}}
                            <div class="d-q-group">
                                <div class="d-q-head">
                                    <span class="d-q-no">{{ $item['no'] }}</span>

                                    <div>
                                        <p class="d-q-text" style="padding-top:3px">{{ $item['teks'] }}</p>
                                        <p class="d-q-group-note">{{ $item['catatan'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- Pertanyaan biasa / sub pertanyaan --}}
                            <div class="d-q-item {{ $item['tipe'] === 'sub' ? 'sub' : '' }}">
                                <div class="d-q-head">
                                    <span class="d-q-no {{ $item['tipe'] === 'sub' ? 'sub' : '' }}">{{ $item['no'] }}</span>

                                    <label for="{{ $item['nama'] }}" class="d-q-text">
                                        {{ $item['teks'] }} <i>*</i>
                                    </label>
                                </div>

                                <textarea id="{{ $item['nama'] }}" name="{{ $item['nama'] }}" rows="{{ $item['rows'] }}" required
                                    placeholder="Tuliskan jawaban secara jelas dan lengkap..." class="d-field"
                                    data-wawancara-jawaban>{{ old($item['nama']) }}</textarea>

                                @error($item['nama'])
                                    <p class="d-err">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif

                    @endforeach
                </div>
            </section>

            {{-- D. CATATAN TAMBAHAN --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">D. Catatan Tambahan</h2>
                        <p class="d-card-s">Opsional. Isi bila ada informasi lain yang relevan.</p>
                    </div>
                </div>

                <div class="d-form-grid">
                    <div>
                        <label for="catatan" class="d-label">Catatan tambahan (opsional)</label>
                        <textarea id="catatan" name="catatan" rows="3" placeholder="Masukkan catatan tambahan..."
                            class="d-field">{{ old('catatan') }}</textarea>
                        @error('catatan')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- ================= TOMBOL SIMPAN ================= --}}
            <div class="d-foot">
                <button type="{{ $routeSimpanSiap ? 'submit' : 'button' }}" class="d-pbtn b-mint"
                    @disabled(!$routeSimpanSiap)>
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        <path d="M17 21v-8H7v8M7 3v5h8" />
                    </svg>
                    Simpan Wawancara
                </button>
            </div>

        </form>
    </div>

    {{-- ================= JAVASCRIPT PROGRES ================= --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fields = document.querySelectorAll('[data-wawancara-jawaban]');

            const progressBar = document.getElementById('wawancara-progress-bar');
            const progressPercent = document.getElementById('wawancara-progress-percent');
            const progressText = document.getElementById('wawancara-progress-text');

            function updateProgress() {
                const total = fields.length;
                let terisi = 0;

                fields.forEach(function (field) {
                    if (field.value.trim() !== '') {
                        terisi++;
                    }
                });

                const persen = total > 0 ? Math.round((terisi / total) * 100) : 0;

                progressBar.style.width = persen + '%';
                progressPercent.textContent = persen + '%';
                progressText.textContent = terisi + ' / ' + total + ' jawaban';
            }

            fields.forEach(function (field) {
                field.addEventListener('input', updateProgress);
            });

            updateProgress();
        });
    </script>

@endsection