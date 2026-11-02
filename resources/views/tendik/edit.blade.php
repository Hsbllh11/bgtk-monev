@extends('layouts.app')

@section('title', 'Edit Instrumen TENDIK')

@section('content')

    <style>
        /* ===================== TOKEN WARNA (sama dengan Edit BCKS / Data Sekolah) ===================== */
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

        [data-level-section][hidden] {
            display: none;
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

        /* --- tombol pastel (warna mengikuti tile) --- */
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

        .d-foot {
            display: flex;
            justify-content: flex-end;
        }

        /* --- info instrumen + progres --- */
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

        .d-prog-sep {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid var(--line);
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
        }

        .d-label {
            display: block;
            margin-bottom: 8px;
            font-size: 12.5px;
            font-weight: 600;
            color: var(--ink);
            line-height: 1.6;
        }

        .d-label i {
            color: #e11d48;
            font-style: normal;
        }

        .d-label .d-hint {
            font-weight: 500;
            color: #94a3b8;
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

        /* --- tabel --- */
        .d-table {
            width: 100%;
            border-collapse: collapse;
        }

        .d-table th {
            padding: 12px 16px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--line);
        }

        .d-table th.center {
            text-align: center;
        }

        .d-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--line);
            vertical-align: middle;
        }

        .d-table tbody tr.d-data {
            transition: background .2s;
        }

        .d-table tbody tr.d-data:hover {
            background: #f7f9ff;
        }

        .d-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .d-table .txt {
            font-size: 12.5px;
            font-weight: 600;
            color: #475569;
            white-space: nowrap;
            text-align: center;
        }

        .d-table .q {
            font-size: 13px;
            line-height: 1.7;
            color: #334155;
        }

        .d-star {
            color: #e11d48;
            font-style: normal;
        }

        .d-table-foot {
            padding: 12px 20px;
            border-top: 1px solid var(--line);
            font-size: 12px;
            color: #94a3b8;
        }

        .d-radio {
            width: 20px;
            height: 20px;
            margin: 0;
            cursor: pointer;
            accent-color: var(--p-600);
        }

        .d-radio:focus-visible {
            outline: 3px solid var(--p-100);
            outline-offset: 2px;
        }

        /* --- rubrik (collapsible) --- */
        .d-details {
            border-top: 1px solid var(--line);
            background: #f9fbff;
        }

        .d-details summary {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 16px 20px;
            cursor: pointer;
            list-style: none;
        }

        .d-details summary::-webkit-details-marker {
            display: none;
        }

        .d-sum-l {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .d-chev {
            flex-shrink: 0;
            color: #94a3b8;
            transition: transform .2s;
        }

        .d-details[open] .d-chev {
            transform: rotate(180deg);
        }

        .d-rubrik-inner {
            padding: 0 20px 20px;
        }

        .d-rubrik-box {
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 14px;
            background: #fff;
        }

        .d-rubrik-box .d-table td {
            vertical-align: top;
            padding: 12px 16px;
        }

        .d-rubrik-box .kat {
            font-size: 13px;
            font-weight: 700;
            color: #334155;
        }

        .d-rubrik-box .krit {
            font-size: 12.5px;
            line-height: 1.7;
            color: #475569;
        }
    </style>

    <div class="d-wrap">

        {{-- =========================================================
        HEADER HALAMAN
        ========================================================== --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Edit Instrumen Monev <b>TENDIK</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('tendik.show', $tendik->id) }}">Instrumen</a>
                        &nbsp;›&nbsp; Edit TENDIK
                    </p>
                    <p class="d-desc">
                        Perbarui identitas dan hasil Monitoring dan Evaluasi TENDIK
                    </p>
                </div>

                {{-- Kembali --}}
                <a href="{{ route('tendik.show', $tendik->id) }}" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </section>

        {{-- =========================================================
        INFORMASI INSTRUMEN & PROGRESS
        ========================================================== --}}
        <div class="d-card">
            <div class="d-info-card">

                {{-- INFORMASI INSTRUMEN --}}
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
                            <h2 class="d-card-h">Instrumen Monitoring dan Evaluasi Tenaga Kependidikan</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Instrumen ini digunakan untuk mengevaluasi efektivitas pelatihan dan dampak penerapan
                                kompetensi Tenaga Kependidikan (TENDIK).
                            </p>
                        </div>
                    </div>

                    {{-- PETUNJUK --}}
                    <div class="d-note">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                            <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>

                        <div>
                            <b class="t">Petunjuk pengisian</b>
                            Pilih satu jawaban yang paling sesuai dengan pendapat atau kondisi Anda untuk setiap
                            pernyataan:
                            <strong>1</strong> Sangat Tidak Setuju (STS),
                            <strong>2</strong> Tidak Setuju (TS),
                            <strong>3</strong> Setuju (S),
                            <strong>4</strong> Sangat Setuju (SS).
                            Pastikan seluruh 43 butir pernyataan telah diisi.
                        </div>
                    </div>
                </div>

                {{-- PROGRESS PENGISIAN --}}
                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres pengisian</span>
                        <span id="tendik-progress-percent" class="d-prog-pct">0%</span>
                    </div>

                    <div class="d-bar">
                        <div id="tendik-progress-bar" style="width: 0%"></div>
                    </div>

                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="tendik-progress-text" class="d-prog-val">0 / 43 butir</span>
                        <span class="d-prog-label" style="font-weight:500">Penilaian</span>
                    </div>

                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="tendik-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
                    </div>
                </div>

            </div>
        </div>

        @if ($errors->any())
            <div class="d-error">
                <b>Periksa kembali isian berikut:</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tendik.update', $tendik->id) }}" method="POST" class="d-form">
            @csrf
            @method('PUT')

            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Petugas Monev</h2>
                        <p class="d-card-s">Masukkan identitas petugas yang melakukan monitoring dan evaluasi.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">

                    {{-- Nama Petugas Monev --}}
                    <div>
                        <label for="nama_petugas_monev" class="d-label">
                            Nama Petugas Monev <i>*</i>
                        </label>
                        <input id="nama_petugas_monev" name="nama_petugas_monev"
                            value="{{ old('nama_petugas_monev', $tendik->nama_petugas_monev) }}" required class="d-field">
                        @error('nama_petugas_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Instansi Petugas --}}
                    <div>
                        <label for="instansi_petugas" class="d-label">
                            Instansi Petugas <i>*</i>
                        </label>
                        <input id="instansi_petugas" name="instansi_petugas"
                            value="{{ old('instansi_petugas', $tendik->instansi_petugas) }}" required class="d-field">
                        @error('instansi_petugas')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Lokasi Monev --}}
                    <div>
                        <label for="lokasi_monev" class="d-label">
                            Lokasi Monev <i>*</i>
                        </label>
                        <input id="lokasi_monev" name="lokasi_monev"
                            value="{{ old('lokasi_monev', $tendik->lokasi_monev) }}" placeholder="Masukkan lokasi Monev"
                            required class="d-field">
                        @error('lokasi_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal Pelaksanaan --}}
                    <div>
                        <label for="tanggal_pengisian" class="d-label">
                            Tanggal Pelaksanaan <i>*</i>
                        </label>
                        <input id="tanggal_pengisian" type="date" name="tanggal_pengisian"
                            value="{{ old('tanggal_pengisian', $tendik->tanggal_pengisian ? \Illuminate\Support\Carbon::parse($tendik->tanggal_pengisian)->format('Y-m-d') : now()->format('Y-m-d')) }}"
                            required class="d-field">
                        @error('tanggal_pengisian')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

            </section>

            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Identitas Responden</h2>
                        <p class="d-card-s">Tanda bintang (*) menunjukkan kolom wajib diisi.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    <div>
                        <label for="nama_responden" class="d-label">Nama Responden <i>*</i></label>
                        <input id="nama_responden" name="nama_responden"
                            value="{{ old('nama_responden', $tendik->nama_responden) }}" required class="d-field">
                        @error('nama_responden')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jabatan_responden" class="d-label">Jabatan <i>*</i></label>
                        <select id="jabatan_responden" name="jabatan_responden" required class="d-field">
                            <option value="">Pilih jabatan</option>
                            <option value="Tendik" @selected(old('jabatan_responden', $tendik->jabatan_responden) === 'Tendik')>Tendik</option>
                            <option value="Operator" @selected(old('jabatan_responden', $tendik->jabatan_responden) === 'Operator')>Operator</option>
                            <option value="Bendahara" @selected(old('jabatan_responden', $tendik->jabatan_responden) === 'Bendahara')>Bendahara</option>
                            <option value="Kepala Sekolah" @selected(old('jabatan_responden', $tendik->jabatan_responden) === 'Kepala Sekolah')>Kepala
                                Sekolah</option>
                            <option value="Rekan Sejawat/Guru" @selected(old('jabatan_responden', $tendik->jabatan_responden) === 'Rekan Sejawat/Guru')>
                                Rekan Sejawat/Guru</option>
                        </select>
                        @error('jabatan_responden')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="jabatan-lainnya-wrap">
                        <label for="jabatan_lainnya" class="d-label">Jabatan Lainnya
                            <span class="d-hint">(jika memilih Lainnya)</span></label>
                        <input id="jabatan_lainnya" name="jabatan_lainnya"
                            value="{{ old('jabatan_lainnya', $tendik->jabatan_lainnya) }}" class="d-field">
                        @error('jabatan_lainnya')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="satuan_pendidikan" class="d-label">Satuan Pendidikan <i>*</i></label>
                        <input id="satuan_pendidikan" name="satuan_pendidikan"
                            value="{{ old('satuan_pendidikan', $tendik->satuan_pendidikan) }}" required class="d-field">
                        @error('satuan_pendidikan')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="masa_kerja" class="d-label">Masa Kerja (tahun) <i>*</i></label>
                        <input id="masa_kerja" type="number" min="0" max="100" name="masa_kerja"
                            value="{{ old('masa_kerja', $tendik->masa_kerja) }}" required class="d-field">
                        @error('masa_kerja')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_pelatihan" class="d-label">Nama Kegiatan/Pelatihan <i>*</i></label>
                        <input id="nama_pelatihan" name="nama_pelatihan"
                            value="{{ old('nama_pelatihan', $tendik->nama_pelatihan) }}" required class="d-field">
                        @error('nama_pelatihan')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_pengisian" class="d-label">Tanggal Pengisian <i>*</i></label>
                        <input id="tanggal_pengisian" type="date" name="tanggal_pengisian"
                            value="{{ old('tanggal_pengisian', $tendik->tanggal_pengisian ? \Illuminate\Support\Carbon::parse($tendik->tanggal_pengisian)->format('Y-m-d') : now()->format('Y-m-d')) }}"
                            required class="d-field">
                        @error('tanggal_pengisian')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            <section class="d-card" data-level-section="1">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Level I — Reaksi</h2>
                        <p class="d-card-s">Penilaian terhadap materi, narasumber/fasilitator, layanan, dan kepuasan
                            kegiatan.</p>
                    </div>
                    <span class="d-badge" style="background:#dbeafe;color:#1d4ed8">15 indikator</span>
                </div>

                <div style="overflow-x:auto">
                    <table class="d-table" style="min-width:900px">
                        <thead>
                            <tr>
                                <th class="center" style="width:80px">No</th>
                                <th>Pertanyaan / Indikator</th>
                                <th class="center" style="width:80px">1</th>
                                <th class="center" style="width:80px">2</th>
                                <th class="center" style="width:80px">3</th>
                                <th class="center" style="width:80px">4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-data">
                                <td class="txt">1</td>
                                <td class="q">
                                    Materi pelatihan sesuai dengan tugas dan kebutuhan saya sebagai tenaga kependidikan. <i
                                        class="d-star">*</i>
                                    @error('jawaban_1')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_1" value="1"
                                        @checked((string) old('jawaban_1', $tendik->jawaban_1) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_1" value="2"
                                        @checked((string) old('jawaban_1', $tendik->jawaban_1) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_1" value="3"
                                        @checked((string) old('jawaban_1', $tendik->jawaban_1) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_1" value="4"
                                        @checked((string) old('jawaban_1', $tendik->jawaban_1) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">2</td>
                                <td class="q">
                                    Cakupan materi lengkap dan disusun secara runtut sehingga mudah diikuti. <i
                                        class="d-star">*</i>
                                    @error('jawaban_2')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_2" value="1"
                                        @checked((string) old('jawaban_2', $tendik->jawaban_2) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_2" value="2"
                                        @checked((string) old('jawaban_2', $tendik->jawaban_2) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_2" value="3"
                                        @checked((string) old('jawaban_2', $tendik->jawaban_2) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_2" value="4"
                                        @checked((string) old('jawaban_2', $tendik->jawaban_2) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">3</td>
                                <td class="q">
                                    Materi yang disampaikan sesuai dengan ketentuan dan perkembangan terbaru. <i
                                        class="d-star">*</i>
                                    @error('jawaban_3')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_3" value="1"
                                        @checked((string) old('jawaban_3', $tendik->jawaban_3) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_3" value="2"
                                        @checked((string) old('jawaban_3', $tendik->jawaban_3) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_3" value="3"
                                        @checked((string) old('jawaban_3', $tendik->jawaban_3) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_3" value="4"
                                        @checked((string) old('jawaban_3', $tendik->jawaban_3) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">4</td>
                                <td class="q">
                                    Materi dilengkapi contoh kasus dan praktik sehingga dapat saya terapkan langsung di
                                    sekolah. <i class="d-star">*</i>
                                    @error('jawaban_4')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_4" value="1"
                                        @checked((string) old('jawaban_4', $tendik->jawaban_4) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_4" value="2"
                                        @checked((string) old('jawaban_4', $tendik->jawaban_4) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_4" value="3"
                                        @checked((string) old('jawaban_4', $tendik->jawaban_4) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_4" value="4"
                                        @checked((string) old('jawaban_4', $tendik->jawaban_4) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">5</td>
                                <td class="q">
                                    Bahan pendukung (modul, tayangan, contoh dokumen) lengkap, jelas, dan bermanfaat. <i
                                        class="d-star">*</i>
                                    @error('jawaban_5')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_5" value="1"
                                        @checked((string) old('jawaban_5', $tendik->jawaban_5) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_5" value="2"
                                        @checked((string) old('jawaban_5', $tendik->jawaban_5) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_5" value="3"
                                        @checked((string) old('jawaban_5', $tendik->jawaban_5) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_5" value="4"
                                        @checked((string) old('jawaban_5', $tendik->jawaban_5) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">6</td>
                                <td class="q">
                                    Narasumber/fasilitator menguasai materi dan menjawab pertanyaan dengan tepat. <i
                                        class="d-star">*</i>
                                    @error('jawaban_6')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_6" value="1"
                                        @checked((string) old('jawaban_6', $tendik->jawaban_6) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_6" value="2"
                                        @checked((string) old('jawaban_6', $tendik->jawaban_6) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_6" value="3"
                                        @checked((string) old('jawaban_6', $tendik->jawaban_6) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_6" value="4"
                                        @checked((string) old('jawaban_6', $tendik->jawaban_6) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">7</td>
                                <td class="q">
                                    Narasumber/fasilitator menyampaikan materi dengan jelas, sistematis, dan mudah dipahami.
                                    <i class="d-star">*</i>
                                    @error('jawaban_7')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_7" value="1"
                                        @checked((string) old('jawaban_7', $tendik->jawaban_7) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_7" value="2"
                                        @checked((string) old('jawaban_7', $tendik->jawaban_7) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_7" value="3"
                                        @checked((string) old('jawaban_7', $tendik->jawaban_7) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_7" value="4"
                                        @checked((string) old('jawaban_7', $tendik->jawaban_7) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">8</td>
                                <td class="q">
                                    Metode dan media pembelajaran (contoh kasus, praktik, tayangan) membuat saya tertarik
                                    dan terlibat aktif. <i class="d-star">*</i>
                                    @error('jawaban_8')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_8" value="1"
                                        @checked((string) old('jawaban_8', $tendik->jawaban_8) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_8" value="2"
                                        @checked((string) old('jawaban_8', $tendik->jawaban_8) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_8" value="3"
                                        @checked((string) old('jawaban_8', $tendik->jawaban_8) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_8" value="4"
                                        @checked((string) old('jawaban_8', $tendik->jawaban_8) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">9</td>
                                <td class="q">
                                    Narasumber/fasilitator terbuka terhadap pertanyaan, mendorong diskusi, dan memberikan
                                    umpan balik. <i class="d-star">*</i>
                                    @error('jawaban_9')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_9" value="1"
                                        @checked((string) old('jawaban_9', $tendik->jawaban_9) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_9" value="2"
                                        @checked((string) old('jawaban_9', $tendik->jawaban_9) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_9" value="3"
                                        @checked((string) old('jawaban_9', $tendik->jawaban_9) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_9" value="4"
                                        @checked((string) old('jawaban_9', $tendik->jawaban_9) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">10</td>
                                <td class="q">
                                    Narasumber/fasilitator bersikap ramah dan santun serta mengelola waktu dengan baik. <i
                                        class="d-star">*</i>
                                    @error('jawaban_10')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_10" value="1"
                                        @checked((string) old('jawaban_10', $tendik->jawaban_10) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_10" value="2"
                                        @checked((string) old('jawaban_10', $tendik->jawaban_10) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_10" value="3"
                                        @checked((string) old('jawaban_10', $tendik->jawaban_10) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_10" value="4"
                                        @checked((string) old('jawaban_10', $tendik->jawaban_10) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">11</td>
                                <td class="q">
                                    Informasi kegiatan (undangan, jadwal, dan bahan) disampaikan dengan jelas dan tepat
                                    waktu. <i class="d-star">*</i>
                                    @error('jawaban_11')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_11" value="1"
                                        @checked((string) old('jawaban_11', $tendik->jawaban_11) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_11" value="2"
                                        @checked((string) old('jawaban_11', $tendik->jawaban_11) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_11" value="3"
                                        @checked((string) old('jawaban_11', $tendik->jawaban_11) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_11" value="4"
                                        @checked((string) old('jawaban_11', $tendik->jawaban_11) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">12</td>
                                <td class="q">
                                    Alokasi waktu dan jadwal pelatihan memadai dan dijalankan sesuai rencana. <i
                                        class="d-star">*</i>
                                    @error('jawaban_12')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_12" value="1"
                                        @checked((string) old('jawaban_12', $tendik->jawaban_12) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_12" value="2"
                                        @checked((string) old('jawaban_12', $tendik->jawaban_12) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_12" value="3"
                                        @checked((string) old('jawaban_12', $tendik->jawaban_12) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_12" value="4"
                                        @checked((string) old('jawaban_12', $tendik->jawaban_12) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">13</td>
                                <td class="q">
                                    Tempat, sarana prasarana, dan konsumsi mendukung kelancaran kegiatan. <i
                                        class="d-star">*</i>
                                    @error('jawaban_13')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_13" value="1"
                                        @checked((string) old('jawaban_13', $tendik->jawaban_13) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_13" value="2"
                                        @checked((string) old('jawaban_13', $tendik->jawaban_13) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_13" value="3"
                                        @checked((string) old('jawaban_13', $tendik->jawaban_13) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_13" value="4"
                                        @checked((string) old('jawaban_13', $tendik->jawaban_13) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">14</td>
                                <td class="q">
                                    Panitia melayani peserta dengan ramah, cepat tanggap, dan membantu. <i
                                        class="d-star">*</i>
                                    @error('jawaban_14')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_14" value="1"
                                        @checked((string) old('jawaban_14', $tendik->jawaban_14) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_14" value="2"
                                        @checked((string) old('jawaban_14', $tendik->jawaban_14) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_14" value="3"
                                        @checked((string) old('jawaban_14', $tendik->jawaban_14) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_14" value="4"
                                        @checked((string) old('jawaban_14', $tendik->jawaban_14) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">15</td>
                                <td class="q">
                                    Secara keseluruhan, saya puas dengan penyelenggaraan pelatihan ini. <i
                                        class="d-star">*</i>
                                    @error('jawaban_15')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_15" value="1"
                                        @checked((string) old('jawaban_15', $tendik->jawaban_15) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_15" value="2"
                                        @checked((string) old('jawaban_15', $tendik->jawaban_15) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_15" value="3"
                                        @checked((string) old('jawaban_15', $tendik->jawaban_15) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_15" value="4"
                                        @checked((string) old('jawaban_15', $tendik->jawaban_15) === '4') required
                                        class="d-radio"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <p class="d-table-foot">Pilih satu skor untuk setiap indikator.</p>

                <details class="d-details">
                    <summary>
                        <div class="d-sum-l">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="flex-shrink:0;margin-top:2px;color:var(--p-600)">
                                <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                            <div style="min-width:0">
                                <h3 class="d-card-h" style="font-size:14px">Rubrik Penilaian Level I — Reaksi</h3>
                                <p class="d-card-s" style="line-height:1.7">Makna skor 1–4 untuk setiap indikator pada Level
                                    I (Reaksi). Klik untuk melihat atau menyembunyikan.</p>
                            </div>
                        </div>
                        <svg class="d-chev" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    <div class="d-rubrik-inner">
                        <div class="d-rubrik-box">
                            <table class="d-table" style="min-width:960px">
                                <thead>
                                    <tr>
                                        <th class="center" style="width:80px">No</th>
                                        <th style="width:176px">Indikator</th>
                                        <th>Skor 4 (Sangat Baik)</th>
                                        <th>Skor 3 (Baik)</th>
                                        <th>Skor 2 (Cukup)</th>
                                        <th>Skor 1 (Kurang)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="txt">1</td>
                                        <td class="kat">Relevansi materi</td>
                                        <td class="krit">Seluruh materi sangat sesuai dengan tugas dan kebutuhan kerja saya.
                                        </td>
                                        <td class="krit">Sebagian besar materi sesuai dengan tugas dan kebutuhan kerja saya.
                                        </td>
                                        <td class="krit">Hanya sebagian kecil materi yang sesuai dengan tugas saya.</td>
                                        <td class="krit">Materi tidak sesuai dengan tugas dan kebutuhan kerja saya.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">2</td>
                                        <td class="kat">Kelengkapan dan keruntutan</td>
                                        <td class="krit">Cakupan materi lengkap, runtut, dan seluruhnya mudah diikuti.</td>
                                        <td class="krit">Cakupan lengkap dan runtut; sebagian kecil perlu penjelasan
                                            tambahan.</td>
                                        <td class="krit">Cakupan kurang lengkap atau urutan sering membingungkan.</td>
                                        <td class="krit">Cakupan tidak lengkap dan sulit diikuti.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">3</td>
                                        <td class="kat">Kemutakhiran materi</td>
                                        <td class="krit">Seluruh materi sesuai ketentuan dan perkembangan terbaru.</td>
                                        <td class="krit">Sebagian besar materi sesuai; sedikit bagian perlu diperbarui.</td>
                                        <td class="krit">Banyak bagian materi yang sudah tidak sesuai ketentuan terbaru.
                                        </td>
                                        <td class="krit">Materi tidak sesuai ketentuan dan perkembangan terbaru.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">4</td>
                                        <td class="kat">Keterterapan materi</td>
                                        <td class="krit">Seluruh materi dilengkapi contoh/praktik dan dapat langsung
                                            diterapkan di sekolah.</td>
                                        <td class="krit">Sebagian besar materi dapat langsung diterapkan di sekolah.</td>
                                        <td class="krit">Hanya sebagian kecil materi yang dapat diterapkan.</td>
                                        <td class="krit">Materi tidak dapat diterapkan di sekolah.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">5</td>
                                        <td class="kat">Bahan pendukung</td>
                                        <td class="krit">Modul, tayangan, dan contoh dokumen lengkap, jelas, dan sangat
                                            membantu.</td>
                                        <td class="krit">Bahan pendukung lengkap dan cukup membantu.</td>
                                        <td class="krit">Bahan pendukung kurang lengkap atau kurang jelas.</td>
                                        <td class="krit">Bahan pendukung tidak tersedia atau tidak membantu.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">6</td>
                                        <td class="kat">Penguasaan materi</td>
                                        <td class="krit">Sangat menguasai materi; jawaban selalu tepat dan disertai contoh
                                            nyata.</td>
                                        <td class="krit">Menguasai materi; sebagian besar jawaban tepat.</td>
                                        <td class="krit">Kurang menguasai materi; jawaban sering kurang tepat.</td>
                                        <td class="krit">Tidak menguasai materi.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">7</td>
                                        <td class="kat">Kejelasan penyampaian</td>
                                        <td class="krit">Penyampaian selalu jelas, sistematis, dan mudah dipahami.</td>
                                        <td class="krit">Umumnya jelas; sesekali perlu pengulangan.</td>
                                        <td class="krit">Sering kurang jelas atau tidak sistematis.</td>
                                        <td class="krit">Penyampaian tidak jelas dan sulit dipahami.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">8</td>
                                        <td class="kat">Metode dan media</td>
                                        <td class="krit">Metode dan media bervariasi dan membuat saya terlibat aktif
                                            sepanjang kegiatan.</td>
                                        <td class="krit">Sebagian besar metode dan media membuat saya terlibat.</td>
                                        <td class="krit">Metode kurang bervariasi; keterlibatan saya rendah.</td>
                                        <td class="krit">Metode monoton dan tidak melibatkan peserta.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">9</td>
                                        <td class="kat">Interaksi dan umpan balik</td>
                                        <td class="krit">Selalu terbuka terhadap pertanyaan, mendorong diskusi, dan memberi
                                            umpan balik bermakna.</td>
                                        <td class="krit">Umumnya terbuka terhadap pertanyaan dan memberi umpan balik.</td>
                                        <td class="krit">Kurang responsif terhadap pertanyaan dan diskusi.</td>
                                        <td class="krit">Tidak responsif terhadap pertanyaan peserta.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">10</td>
                                        <td class="kat">Sikap dan pengelolaan waktu</td>
                                        <td class="krit">Sangat ramah dan santun; waktu dikelola tepat sesuai porsi materi.
                                        </td>
                                        <td class="krit">Ramah dan santun; waktu umumnya terkelola baik.</td>
                                        <td class="krit">Kurang ramah atau kurang disiplin waktu.</td>
                                        <td class="krit">Tidak ramah dan tidak disiplin waktu.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">11</td>
                                        <td class="kat">Informasi kegiatan</td>
                                        <td class="krit">Informasi (undangan, jadwal, bahan) lengkap, jelas, dan selalu
                                            tepat waktu.</td>
                                        <td class="krit">Informasi lengkap dan jelas; sesekali terlambat.</td>
                                        <td class="krit">Informasi kurang lengkap atau kurang jelas.</td>
                                        <td class="krit">Informasi tidak jelas atau tidak saya terima.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">12</td>
                                        <td class="kat">Alokasi waktu dan jadwal</td>
                                        <td class="krit">Alokasi waktu sangat memadai dan jadwal selalu ditaati.</td>
                                        <td class="krit">Alokasi waktu memadai; ada sedikit penyesuaian jadwal.</td>
                                        <td class="krit">Alokasi waktu kurang memadai; jadwal sering bergeser.</td>
                                        <td class="krit">Alokasi waktu tidak memadai dan jadwal tidak terkendali.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">13</td>
                                        <td class="kat">Tempat, sarana, dan konsumsi</td>
                                        <td class="krit">Seluruhnya sangat mendukung kelancaran kegiatan.</td>
                                        <td class="krit">Mendukung kegiatan dengan sedikit kekurangan.</td>
                                        <td class="krit">Kurang mendukung kelancaran kegiatan.</td>
                                        <td class="krit">Tidak mendukung kegiatan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">14</td>
                                        <td class="kat">Pelayanan panitia</td>
                                        <td class="krit">Panitia selalu ramah, sigap, dan membantu kebutuhan peserta.</td>
                                        <td class="krit">Panitia umumnya ramah dan membantu.</td>
                                        <td class="krit">Panitia kurang tanggap terhadap kebutuhan peserta.</td>
                                        <td class="krit">Panitia tidak melayani dengan baik.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">15</td>
                                        <td class="kat">Kepuasan umum</td>
                                        <td class="krit">Sangat puas dan bersedia merekomendasikan pelatihan kepada rekan.
                                        </td>
                                        <td class="krit">Puas terhadap penyelenggaraan pelatihan.</td>
                                        <td class="krit">Kurang puas; banyak hal perlu diperbaiki.</td>
                                        <td class="krit">Tidak puas terhadap penyelenggaraan pelatihan.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </details>
            </section>

            <section class="d-card" data-level-section="2">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Level II — Belajar</h2>
                        <p class="d-card-s">Pengetahuan, keterampilan, dan sikap yang diperoleh melalui pelatihan.</p>
                    </div>
                    <span class="d-badge" style="background:#ede9fe;color:#6d28d9">18 indikator</span>
                </div>

                <div style="overflow-x:auto">
                    <table class="d-table" style="min-width:900px">
                        <thead>
                            <tr>
                                <th class="center" style="width:80px">No</th>
                                <th>Pertanyaan / Indikator</th>
                                <th class="center" style="width:80px">1</th>
                                <th class="center" style="width:80px">2</th>
                                <th class="center" style="width:80px">3</th>
                                <th class="center" style="width:80px">4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-data">
                                <td class="txt">16</td>
                                <td class="q">
                                    Saya memahami jenis data sekolah yang harus dikelola serta alur pengelolaannya
                                    (pengumpulan, verifikasi, dan pemutakhiran). <i class="d-star">*</i>
                                    @error('jawaban_16')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_16" value="1"
                                        @checked((string) old('jawaban_16', $tendik->jawaban_16) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_16" value="2"
                                        @checked((string) old('jawaban_16', $tendik->jawaban_16) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_16" value="3"
                                        @checked((string) old('jawaban_16', $tendik->jawaban_16) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_16" value="4"
                                        @checked((string) old('jawaban_16', $tendik->jawaban_16) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">17</td>
                                <td class="q">
                                    Saya mampu mempraktikkan pengelolaan data sekolah (input, verifikasi, dan pemutakhiran)
                                    sesuai ketentuan. <i class="d-star">*</i>
                                    @error('jawaban_17')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_17" value="1"
                                        @checked((string) old('jawaban_17', $tendik->jawaban_17) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_17" value="2"
                                        @checked((string) old('jawaban_17', $tendik->jawaban_17) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_17" value="3"
                                        @checked((string) old('jawaban_17', $tendik->jawaban_17) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_17" value="4"
                                        @checked((string) old('jawaban_17', $tendik->jawaban_17) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">18</td>
                                <td class="q">
                                    Saya menjadi lebih teliti dan bertanggung jawab dalam menjaga keakuratan data sekolah.
                                    <i class="d-star">*</i>
                                    @error('jawaban_18')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_18" value="1"
                                        @checked((string) old('jawaban_18', $tendik->jawaban_18) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_18" value="2"
                                        @checked((string) old('jawaban_18', $tendik->jawaban_18) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_18" value="3"
                                        @checked((string) old('jawaban_18', $tendik->jawaban_18) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_18" value="4"
                                        @checked((string) old('jawaban_18', $tendik->jawaban_18) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">19</td>
                                <td class="q">
                                    Saya memahami prosedur layanan administrasi sekolah (persuratan, pengarsipan, dan
                                    pelayanan warga sekolah) yang benar. <i class="d-star">*</i>
                                    @error('jawaban_19')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_19" value="1"
                                        @checked((string) old('jawaban_19', $tendik->jawaban_19) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_19" value="2"
                                        @checked((string) old('jawaban_19', $tendik->jawaban_19) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_19" value="3"
                                        @checked((string) old('jawaban_19', $tendik->jawaban_19) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_19" value="4"
                                        @checked((string) old('jawaban_19', $tendik->jawaban_19) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">20</td>
                                <td class="q">
                                    Saya mampu menyusun dokumen persuratan, mengelola arsip, dan melayani warga sekolah
                                    sesuai prosedur. <i class="d-star">*</i>
                                    @error('jawaban_20')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_20" value="1"
                                        @checked((string) old('jawaban_20', $tendik->jawaban_20) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_20" value="2"
                                        @checked((string) old('jawaban_20', $tendik->jawaban_20) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_20" value="3"
                                        @checked((string) old('jawaban_20', $tendik->jawaban_20) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_20" value="4"
                                        @checked((string) old('jawaban_20', $tendik->jawaban_20) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">21</td>
                                <td class="q">
                                    Saya menjadi lebih ramah, tertib, dan responsif dalam melayani kebutuhan warga sekolah.
                                    <i class="d-star">*</i>
                                    @error('jawaban_21')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_21" value="1"
                                        @checked((string) old('jawaban_21', $tendik->jawaban_21) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_21" value="2"
                                        @checked((string) old('jawaban_21', $tendik->jawaban_21) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_21" value="3"
                                        @checked((string) old('jawaban_21', $tendik->jawaban_21) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_21" value="4"
                                        @checked((string) old('jawaban_21', $tendik->jawaban_21) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">22</td>
                                <td class="q">
                                    Saya memahami ketentuan administrasi keuangan dan pelaporan yang berlaku di sekolah. <i
                                        class="d-star">*</i>
                                    @error('jawaban_22')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_22" value="1"
                                        @checked((string) old('jawaban_22', $tendik->jawaban_22) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_22" value="2"
                                        @checked((string) old('jawaban_22', $tendik->jawaban_22) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_22" value="3"
                                        @checked((string) old('jawaban_22', $tendik->jawaban_22) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_22" value="4"
                                        @checked((string) old('jawaban_22', $tendik->jawaban_22) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">23</td>
                                <td class="q">
                                    Saya mampu menyusun pembukuan, bukti transaksi, dan laporan keuangan sesuai format yang
                                    ditetapkan. <i class="d-star">*</i>
                                    @error('jawaban_23')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_23" value="1"
                                        @checked((string) old('jawaban_23', $tendik->jawaban_23) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_23" value="2"
                                        @checked((string) old('jawaban_23', $tendik->jawaban_23) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_23" value="3"
                                        @checked((string) old('jawaban_23', $tendik->jawaban_23) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_23" value="4"
                                        @checked((string) old('jawaban_23', $tendik->jawaban_23) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">24</td>
                                <td class="q">
                                    Saya menjadi lebih jujur, transparan, dan akuntabel dalam mengelola administrasi
                                    keuangan. <i class="d-star">*</i>
                                    @error('jawaban_24')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_24" value="1"
                                        @checked((string) old('jawaban_24', $tendik->jawaban_24) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_24" value="2"
                                        @checked((string) old('jawaban_24', $tendik->jawaban_24) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_24" value="3"
                                        @checked((string) old('jawaban_24', $tendik->jawaban_24) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_24" value="4"
                                        @checked((string) old('jawaban_24', $tendik->jawaban_24) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">25</td>
                                <td class="q">
                                    Saya memahami peran dan manfaat kolaborasi serta jejaring dengan kepala sekolah, guru,
                                    rekan sejawat, dinas, dan mitra. <i class="d-star">*</i>
                                    @error('jawaban_25')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_25" value="1"
                                        @checked((string) old('jawaban_25', $tendik->jawaban_25) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_25" value="2"
                                        @checked((string) old('jawaban_25', $tendik->jawaban_25) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_25" value="3"
                                        @checked((string) old('jawaban_25', $tendik->jawaban_25) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_25" value="4"
                                        @checked((string) old('jawaban_25', $tendik->jawaban_25) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">26</td>
                                <td class="q">
                                    Saya mampu berkomunikasi, berkoordinasi, dan membangun jejaring kerja dengan berbagai
                                    pihak. <i class="d-star">*</i>
                                    @error('jawaban_26')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_26" value="1"
                                        @checked((string) old('jawaban_26', $tendik->jawaban_26) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_26" value="2"
                                        @checked((string) old('jawaban_26', $tendik->jawaban_26) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_26" value="3"
                                        @checked((string) old('jawaban_26', $tendik->jawaban_26) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_26" value="4"
                                        @checked((string) old('jawaban_26', $tendik->jawaban_26) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">27</td>
                                <td class="q">
                                    Saya menjadi lebih terbuka, menghargai pendapat orang lain, dan mau bekerja sama. <i
                                        class="d-star">*</i>
                                    @error('jawaban_27')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_27" value="1"
                                        @checked((string) old('jawaban_27', $tendik->jawaban_27) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_27" value="2"
                                        @checked((string) old('jawaban_27', $tendik->jawaban_27) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_27" value="3"
                                        @checked((string) old('jawaban_27', $tendik->jawaban_27) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_27" value="4"
                                        @checked((string) old('jawaban_27', $tendik->jawaban_27) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">28</td>
                                <td class="q">
                                    Saya memahami bahwa kemampuan dapat berkembang melalui usaha dan belajar, serta
                                    perbedaan growth mindset dengan fixed mindset. <i class="d-star">*</i>
                                    @error('jawaban_28')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_28" value="1"
                                        @checked((string) old('jawaban_28', $tendik->jawaban_28) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_28" value="2"
                                        @checked((string) old('jawaban_28', $tendik->jawaban_28) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_28" value="3"
                                        @checked((string) old('jawaban_28', $tendik->jawaban_28) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_28" value="4"
                                        @checked((string) old('jawaban_28', $tendik->jawaban_28) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">29</td>
                                <td class="q">
                                    Saya mampu merumuskan tujuan pengembangan diri dan strategi menghadapi tantangan serta
                                    umpan balik dalam pekerjaan. <i class="d-star">*</i>
                                    @error('jawaban_29')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_29" value="1"
                                        @checked((string) old('jawaban_29', $tendik->jawaban_29) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_29" value="2"
                                        @checked((string) old('jawaban_29', $tendik->jawaban_29) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_29" value="3"
                                        @checked((string) old('jawaban_29', $tendik->jawaban_29) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_29" value="4"
                                        @checked((string) old('jawaban_29', $tendik->jawaban_29) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">30</td>
                                <td class="q">
                                    Saya memandang tantangan dan kesalahan sebagai peluang belajar dan bersemangat
                                    mengembangkan diri. <i class="d-star">*</i>
                                    @error('jawaban_30')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_30" value="1"
                                        @checked((string) old('jawaban_30', $tendik->jawaban_30) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_30" value="2"
                                        @checked((string) old('jawaban_30', $tendik->jawaban_30) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_30" value="3"
                                        @checked((string) old('jawaban_30', $tendik->jawaban_30) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_30" value="4"
                                        @checked((string) old('jawaban_30', $tendik->jawaban_30) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">31</td>
                                <td class="q">
                                    Saya memahami peran, etika, dan standar kinerja yang dituntut dari tenaga kependidikan
                                    yang profesional. <i class="d-star">*</i>
                                    @error('jawaban_31')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_31" value="1"
                                        @checked((string) old('jawaban_31', $tendik->jawaban_31) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_31" value="2"
                                        @checked((string) old('jawaban_31', $tendik->jawaban_31) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_31" value="3"
                                        @checked((string) old('jawaban_31', $tendik->jawaban_31) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_31" value="4"
                                        @checked((string) old('jawaban_31', $tendik->jawaban_31) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">32</td>
                                <td class="q">
                                    Saya mampu mengatur waktu dan prioritas kerja serta memanfaatkan teknologi secara
                                    profesional. <i class="d-star">*</i>
                                    @error('jawaban_32')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_32" value="1"
                                        @checked((string) old('jawaban_32', $tendik->jawaban_32) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_32" value="2"
                                        @checked((string) old('jawaban_32', $tendik->jawaban_32) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_32" value="3"
                                        @checked((string) old('jawaban_32', $tendik->jawaban_32) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_32" value="4"
                                        @checked((string) old('jawaban_32', $tendik->jawaban_32) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">33</td>
                                <td class="q">
                                    Saya berkomitmen menjaga integritas, disiplin, tanggung jawab, dan kerahasiaan data
                                    dalam bekerja. <i class="d-star">*</i>
                                    @error('jawaban_33')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_33" value="1"
                                        @checked((string) old('jawaban_33', $tendik->jawaban_33) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_33" value="2"
                                        @checked((string) old('jawaban_33', $tendik->jawaban_33) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_33" value="3"
                                        @checked((string) old('jawaban_33', $tendik->jawaban_33) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_33" value="4"
                                        @checked((string) old('jawaban_33', $tendik->jawaban_33) === '4') required
                                        class="d-radio"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <p class="d-table-foot">Pilih satu skor untuk setiap indikator.</p>

                <details class="d-details">
                    <summary>
                        <div class="d-sum-l">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="flex-shrink:0;margin-top:2px;color:var(--p-600)">
                                <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                            <div style="min-width:0">
                                <h3 class="d-card-h" style="font-size:14px">Rubrik Penilaian Level II — Belajar</h3>
                                <p class="d-card-s" style="line-height:1.7">Makna skor 1–4 untuk setiap indikator pada Level
                                    II (Belajar). Klik untuk melihat atau menyembunyikan.</p>
                            </div>
                        </div>
                        <svg class="d-chev" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    <div class="d-rubrik-inner">
                        <div class="d-rubrik-box">
                            <table class="d-table" style="min-width:960px">
                                <thead>
                                    <tr>
                                        <th class="center" style="width:80px">No</th>
                                        <th style="width:176px">Indikator</th>
                                        <th>Skor 4 (Sangat Baik)</th>
                                        <th>Skor 3 (Baik)</th>
                                        <th>Skor 2 (Cukup)</th>
                                        <th>Skor 1 (Kurang)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="txt">16</td>
                                        <td class="kat">Pengelolaan data – Pengetahuan</td>
                                        <td class="krit">Mampu menjelaskan jenis data sekolah dan alur pengelolaannya secara
                                            lengkap dan benar disertai contoh.</td>
                                        <td class="krit">Mampu menjelaskan sebagian besar jenis data sekolah dan alur
                                            pengelolaannya dengan benar.</td>
                                        <td class="krit">Baru memahami sebagian kecil jenis data sekolah dan alur
                                            pengelolaannya; masih memerlukan bimbingan.</td>
                                        <td class="krit">Belum memahami jenis data sekolah dan alur pengelolaannya.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">17</td>
                                        <td class="kat">Pengelolaan data – Keterampilan</td>
                                        <td class="krit">Mampu mempraktikkan input, verifikasi, dan pemutakhiran data
                                            sekolah sesuai ketentuan secara mandiri, tepat, dan sesuai ketentuan.</td>
                                        <td class="krit">Mampu mempraktikkan input, verifikasi, dan pemutakhiran data
                                            sekolah sesuai ketentuan sesuai ketentuan dengan sedikit bantuan.</td>
                                        <td class="krit">Baru mampu mempraktikkan sebagian langkah input, verifikasi, dan
                                            pemutakhiran data sekolah sesuai ketentuan; masih memerlukan bantuan.</td>
                                        <td class="krit">Belum mampu mempraktikkan input, verifikasi, dan pemutakhiran data
                                            sekolah sesuai ketentuan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">18</td>
                                        <td class="kat">Pengelolaan data – Sikap</td>
                                        <td class="krit">Selalu menunjukkan ketelitian dan tanggung jawab dalam menjaga
                                            keakuratan data dalam bekerja.</td>
                                        <td class="krit">Sering menunjukkan ketelitian dan tanggung jawab dalam menjaga
                                            keakuratan data dalam bekerja.</td>
                                        <td class="krit">Kadang-kadang menunjukkan ketelitian dan tanggung jawab dalam
                                            menjaga keakuratan data; belum konsisten.</td>
                                        <td class="krit">Belum menunjukkan ketelitian dan tanggung jawab dalam menjaga
                                            keakuratan data.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">19</td>
                                        <td class="kat">Layanan administrasi – Pengetahuan</td>
                                        <td class="krit">Mampu menjelaskan prosedur persuratan, pengarsipan, dan pelayanan
                                            warga sekolah secara lengkap dan benar disertai contoh.</td>
                                        <td class="krit">Mampu menjelaskan sebagian besar prosedur persuratan, pengarsipan,
                                            dan pelayanan warga sekolah dengan benar.</td>
                                        <td class="krit">Baru memahami sebagian kecil prosedur persuratan, pengarsipan, dan
                                            pelayanan warga sekolah; masih memerlukan bimbingan.</td>
                                        <td class="krit">Belum memahami prosedur persuratan, pengarsipan, dan pelayanan
                                            warga sekolah.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">20</td>
                                        <td class="kat">Layanan administrasi – Keterampilan</td>
                                        <td class="krit">Mampu mempraktikkan penyusunan surat, pengelolaan arsip, dan
                                            pelayanan sesuai prosedur secara mandiri, tepat, dan sesuai ketentuan.</td>
                                        <td class="krit">Mampu mempraktikkan penyusunan surat, pengelolaan arsip, dan
                                            pelayanan sesuai prosedur sesuai ketentuan dengan sedikit bantuan.</td>
                                        <td class="krit">Baru mampu mempraktikkan sebagian langkah penyusunan surat,
                                            pengelolaan arsip, dan pelayanan sesuai prosedur; masih memerlukan bantuan.</td>
                                        <td class="krit">Belum mampu mempraktikkan penyusunan surat, pengelolaan arsip, dan
                                            pelayanan sesuai prosedur.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">21</td>
                                        <td class="kat">Layanan administrasi – Sikap</td>
                                        <td class="krit">Selalu menunjukkan keramahan, ketertiban, dan ketanggapan dalam
                                            melayani dalam bekerja.</td>
                                        <td class="krit">Sering menunjukkan keramahan, ketertiban, dan ketanggapan dalam
                                            melayani dalam bekerja.</td>
                                        <td class="krit">Kadang-kadang menunjukkan keramahan, ketertiban, dan ketanggapan
                                            dalam melayani; belum konsisten.</td>
                                        <td class="krit">Belum menunjukkan keramahan, ketertiban, dan ketanggapan dalam
                                            melayani.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">22</td>
                                        <td class="kat">Administrasi keuangan – Pengetahuan</td>
                                        <td class="krit">Mampu menjelaskan ketentuan administrasi keuangan dan pelaporan
                                            sekolah secara lengkap dan benar disertai contoh.</td>
                                        <td class="krit">Mampu menjelaskan sebagian besar ketentuan administrasi keuangan
                                            dan pelaporan sekolah dengan benar.</td>
                                        <td class="krit">Baru memahami sebagian kecil ketentuan administrasi keuangan dan
                                            pelaporan sekolah; masih memerlukan bimbingan.</td>
                                        <td class="krit">Belum memahami ketentuan administrasi keuangan dan pelaporan
                                            sekolah.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">23</td>
                                        <td class="kat">Administrasi keuangan – Keterampilan</td>
                                        <td class="krit">Mampu mempraktikkan penyusunan pembukuan, bukti transaksi, dan
                                            laporan keuangan secara mandiri, tepat, dan sesuai ketentuan.</td>
                                        <td class="krit">Mampu mempraktikkan penyusunan pembukuan, bukti transaksi, dan
                                            laporan keuangan sesuai ketentuan dengan sedikit bantuan.</td>
                                        <td class="krit">Baru mampu mempraktikkan sebagian langkah penyusunan pembukuan,
                                            bukti transaksi, dan laporan keuangan; masih memerlukan bantuan.</td>
                                        <td class="krit">Belum mampu mempraktikkan penyusunan pembukuan, bukti transaksi,
                                            dan laporan keuangan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">24</td>
                                        <td class="kat">Administrasi keuangan – Sikap</td>
                                        <td class="krit">Selalu menunjukkan kejujuran, transparansi, dan akuntabilitas dalam
                                            administrasi keuangan dalam bekerja.</td>
                                        <td class="krit">Sering menunjukkan kejujuran, transparansi, dan akuntabilitas dalam
                                            administrasi keuangan dalam bekerja.</td>
                                        <td class="krit">Kadang-kadang menunjukkan kejujuran, transparansi, dan
                                            akuntabilitas dalam administrasi keuangan; belum konsisten.</td>
                                        <td class="krit">Belum menunjukkan kejujuran, transparansi, dan akuntabilitas dalam
                                            administrasi keuangan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">25</td>
                                        <td class="kat">Kolaborasi dan jejaring – Pengetahuan</td>
                                        <td class="krit">Mampu menjelaskan peran dan manfaat kolaborasi serta jejaring kerja
                                            secara lengkap dan benar disertai contoh.</td>
                                        <td class="krit">Mampu menjelaskan sebagian besar peran dan manfaat kolaborasi serta
                                            jejaring kerja dengan benar.</td>
                                        <td class="krit">Baru memahami sebagian kecil peran dan manfaat kolaborasi serta
                                            jejaring kerja; masih memerlukan bimbingan.</td>
                                        <td class="krit">Belum memahami peran dan manfaat kolaborasi serta jejaring kerja.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="txt">26</td>
                                        <td class="kat">Kolaborasi dan jejaring – Keterampilan</td>
                                        <td class="krit">Mampu mempraktikkan komunikasi, koordinasi, dan pembangunan
                                            jejaring kerja secara mandiri, tepat, dan sesuai ketentuan.</td>
                                        <td class="krit">Mampu mempraktikkan komunikasi, koordinasi, dan pembangunan
                                            jejaring kerja sesuai ketentuan dengan sedikit bantuan.</td>
                                        <td class="krit">Baru mampu mempraktikkan sebagian langkah komunikasi, koordinasi,
                                            dan pembangunan jejaring kerja; masih memerlukan bantuan.</td>
                                        <td class="krit">Belum mampu mempraktikkan komunikasi, koordinasi, dan pembangunan
                                            jejaring kerja.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">27</td>
                                        <td class="kat">Kolaborasi dan jejaring – Sikap</td>
                                        <td class="krit">Selalu menunjukkan keterbukaan, sikap menghargai, dan kemauan
                                            bekerja sama dalam bekerja.</td>
                                        <td class="krit">Sering menunjukkan keterbukaan, sikap menghargai, dan kemauan
                                            bekerja sama dalam bekerja.</td>
                                        <td class="krit">Kadang-kadang menunjukkan keterbukaan, sikap menghargai, dan
                                            kemauan bekerja sama; belum konsisten.</td>
                                        <td class="krit">Belum menunjukkan keterbukaan, sikap menghargai, dan kemauan
                                            bekerja sama.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">28</td>
                                        <td class="kat">Growth mindset – Pengetahuan</td>
                                        <td class="krit">Mampu menjelaskan konsep growth mindset dan perbedaannya dengan
                                            fixed mindset secara lengkap dan benar disertai contoh.</td>
                                        <td class="krit">Mampu menjelaskan sebagian besar konsep growth mindset dan
                                            perbedaannya dengan fixed mindset dengan benar.</td>
                                        <td class="krit">Baru memahami sebagian kecil konsep growth mindset dan perbedaannya
                                            dengan fixed mindset; masih memerlukan bimbingan.</td>
                                        <td class="krit">Belum memahami konsep growth mindset dan perbedaannya dengan fixed
                                            mindset.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">29</td>
                                        <td class="kat">Growth mindset – Keterampilan</td>
                                        <td class="krit">Mampu mempraktikkan perumusan tujuan pengembangan diri dan strategi
                                            menghadapi tantangan secara mandiri, tepat, dan sesuai ketentuan.</td>
                                        <td class="krit">Mampu mempraktikkan perumusan tujuan pengembangan diri dan strategi
                                            menghadapi tantangan sesuai ketentuan dengan sedikit bantuan.</td>
                                        <td class="krit">Baru mampu mempraktikkan sebagian langkah perumusan tujuan
                                            pengembangan diri dan strategi menghadapi tantangan; masih memerlukan bantuan.
                                        </td>
                                        <td class="krit">Belum mampu mempraktikkan perumusan tujuan pengembangan diri dan
                                            strategi menghadapi tantangan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">30</td>
                                        <td class="kat">Growth mindset – Sikap</td>
                                        <td class="krit">Selalu menunjukkan pandangan terhadap tantangan dan kesalahan
                                            sebagai peluang belajar dalam bekerja.</td>
                                        <td class="krit">Sering menunjukkan pandangan terhadap tantangan dan kesalahan
                                            sebagai peluang belajar dalam bekerja.</td>
                                        <td class="krit">Kadang-kadang menunjukkan pandangan terhadap tantangan dan
                                            kesalahan sebagai peluang belajar; belum konsisten.</td>
                                        <td class="krit">Belum menunjukkan pandangan terhadap tantangan dan kesalahan
                                            sebagai peluang belajar.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">31</td>
                                        <td class="kat">Profesionalisme – Pengetahuan</td>
                                        <td class="krit">Mampu menjelaskan peran, etika, dan standar kinerja tenaga
                                            kependidikan secara lengkap dan benar disertai contoh.</td>
                                        <td class="krit">Mampu menjelaskan sebagian besar peran, etika, dan standar kinerja
                                            tenaga kependidikan dengan benar.</td>
                                        <td class="krit">Baru memahami sebagian kecil peran, etika, dan standar kinerja
                                            tenaga kependidikan; masih memerlukan bimbingan.</td>
                                        <td class="krit">Belum memahami peran, etika, dan standar kinerja tenaga
                                            kependidikan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">32</td>
                                        <td class="kat">Profesionalisme – Keterampilan</td>
                                        <td class="krit">Mampu mempraktikkan pengaturan waktu, prioritas kerja, dan
                                            pemanfaatan teknologi secara profesional secara mandiri, tepat, dan sesuai
                                            ketentuan.</td>
                                        <td class="krit">Mampu mempraktikkan pengaturan waktu, prioritas kerja, dan
                                            pemanfaatan teknologi secara profesional sesuai ketentuan dengan sedikit
                                            bantuan.</td>
                                        <td class="krit">Baru mampu mempraktikkan sebagian langkah pengaturan waktu,
                                            prioritas kerja, dan pemanfaatan teknologi secara profesional; masih memerlukan
                                            bantuan.</td>
                                        <td class="krit">Belum mampu mempraktikkan pengaturan waktu, prioritas kerja, dan
                                            pemanfaatan teknologi secara profesional.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">33</td>
                                        <td class="kat">Profesionalisme – Sikap</td>
                                        <td class="krit">Selalu menunjukkan komitmen pada integritas, disiplin, tanggung
                                            jawab, dan kerahasiaan data dalam bekerja.</td>
                                        <td class="krit">Sering menunjukkan komitmen pada integritas, disiplin, tanggung
                                            jawab, dan kerahasiaan data dalam bekerja.</td>
                                        <td class="krit">Kadang-kadang menunjukkan komitmen pada integritas, disiplin,
                                            tanggung jawab, dan kerahasiaan data; belum konsisten.</td>
                                        <td class="krit">Belum menunjukkan komitmen pada integritas, disiplin, tanggung
                                            jawab, dan kerahasiaan data.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </details>
            </section>

            <section class="d-card" data-level-section="3">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Level III — Perilaku</h2>
                        <p class="d-card-s">Penerapan hasil pelatihan dalam pelaksanaan tugas di sekolah.</p>
                    </div>
                    <span class="d-badge" style="background:#d1fae5;color:#047857">5 indikator</span>
                </div>

                <div style="overflow-x:auto">
                    <table class="d-table" style="min-width:900px">
                        <thead>
                            <tr>
                                <th class="center" style="width:80px">No</th>
                                <th>Pertanyaan / Indikator</th>
                                <th class="center" style="width:80px">1</th>
                                <th class="center" style="width:80px">2</th>
                                <th class="center" style="width:80px">3</th>
                                <th class="center" style="width:80px">4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-data">
                                <td class="txt">34</td>
                                <td class="q">
                                    Saya menerapkan hasil pelatihan dalam pengelolaan data sekolah, yaitu memperbarui dan
                                    memverifikasi data secara berkala. <i class="d-star">*</i>
                                    @error('jawaban_34')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_34" value="1"
                                        @checked((string) old('jawaban_34', $tendik->jawaban_34) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_34" value="2"
                                        @checked((string) old('jawaban_34', $tendik->jawaban_34) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_34" value="3"
                                        @checked((string) old('jawaban_34', $tendik->jawaban_34) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_34" value="4"
                                        @checked((string) old('jawaban_34', $tendik->jawaban_34) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">35</td>
                                <td class="q">
                                    Saya melayani kebutuhan administrasi warga sekolah dengan lebih cepat, tertib, dan
                                    ramah. <i class="d-star">*</i>
                                    @error('jawaban_35')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_35" value="1"
                                        @checked((string) old('jawaban_35', $tendik->jawaban_35) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_35" value="2"
                                        @checked((string) old('jawaban_35', $tendik->jawaban_35) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_35" value="3"
                                        @checked((string) old('jawaban_35', $tendik->jawaban_35) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_35" value="4"
                                        @checked((string) old('jawaban_35', $tendik->jawaban_35) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">36</td>
                                <td class="q">
                                    Saya menyusun dokumen administrasi dan laporan (termasuk laporan keuangan) tepat waktu
                                    dan sesuai format. <i class="d-star">*</i>
                                    @error('jawaban_36')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_36" value="1"
                                        @checked((string) old('jawaban_36', $tendik->jawaban_36) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_36" value="2"
                                        @checked((string) old('jawaban_36', $tendik->jawaban_36) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_36" value="3"
                                        @checked((string) old('jawaban_36', $tendik->jawaban_36) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_36" value="4"
                                        @checked((string) old('jawaban_36', $tendik->jawaban_36) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">37</td>
                                <td class="q">
                                    Saya berkolaborasi aktif dengan kepala sekolah, guru, rekan tenaga kependidikan, dan
                                    pihak luar (dinas, mitra jejaring) dalam menjalankan tugas. <i class="d-star">*</i>
                                    @error('jawaban_37')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_37" value="1"
                                        @checked((string) old('jawaban_37', $tendik->jawaban_37) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_37" value="2"
                                        @checked((string) old('jawaban_37', $tendik->jawaban_37) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_37" value="3"
                                        @checked((string) old('jawaban_37', $tendik->jawaban_37) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_37" value="4"
                                        @checked((string) old('jawaban_37', $tendik->jawaban_37) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">38</td>
                                <td class="q">
                                    Saya memanfaatkan teknologi dalam bekerja dan menjaga keamanan serta kerahasiaan data
                                    sekolah. <i class="d-star">*</i>
                                    @error('jawaban_38')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_38" value="1"
                                        @checked((string) old('jawaban_38', $tendik->jawaban_38) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_38" value="2"
                                        @checked((string) old('jawaban_38', $tendik->jawaban_38) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_38" value="3"
                                        @checked((string) old('jawaban_38', $tendik->jawaban_38) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_38" value="4"
                                        @checked((string) old('jawaban_38', $tendik->jawaban_38) === '4') required
                                        class="d-radio"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <p class="d-table-foot">Pilih satu skor untuk setiap indikator.</p>

                <details class="d-details">
                    <summary>
                        <div class="d-sum-l">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="flex-shrink:0;margin-top:2px;color:var(--p-600)">
                                <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                            <div style="min-width:0">
                                <h3 class="d-card-h" style="font-size:14px">Rubrik Penilaian Level III — Perilaku</h3>
                                <p class="d-card-s" style="line-height:1.7">Makna skor 1-4 untuk setiap indikator pada Level
                                    III (Perilaku). Klik untuk melihat atau menyembunyikan.</p>
                            </div>
                        </div>
                        <svg class="d-chev" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    <div class="d-rubrik-inner">
                        <div class="d-rubrik-box">
                            <table class="d-table" style="min-width:960px">
                                <thead>
                                    <tr>
                                        <th class="center" style="width:80px">No</th>
                                        <th style="width:176px">Indikator</th>
                                        <th>Skor 4 (Sangat Baik)</th>
                                        <th>Skor 3 (Baik)</th>
                                        <th>Skor 2 (Cukup)</th>
                                        <th>Skor 1 (Kurang)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="txt">34</td>
                                        <td class="kat">Pengelolaan data</td>
                                        <td class="krit">Selalu memperbarui dan memverifikasi data sekolah secara berkala
                                            dan telah menjadi kebiasaan kerja.</td>
                                        <td class="krit">Sering memperbarui dan memverifikasi data sekolah secara berkala;
                                            sesekali masih terlewat.</td>
                                        <td class="krit">Kadang-kadang memperbarui dan memverifikasi data sekolah secara
                                            berkala; belum konsisten.</td>
                                        <td class="krit">Belum memperbarui dan memverifikasi data sekolah secara berkala
                                            setelah mengikuti pelatihan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">35</td>
                                        <td class="kat">Layanan administrasi</td>
                                        <td class="krit">Selalu melayani kebutuhan administrasi warga sekolah dengan cepat,
                                            tertib, dan ramah dan telah menjadi kebiasaan kerja.</td>
                                        <td class="krit">Sering melayani kebutuhan administrasi warga sekolah dengan cepat,
                                            tertib, dan ramah; sesekali masih terlewat.</td>
                                        <td class="krit">Kadang-kadang melayani kebutuhan administrasi warga sekolah dengan
                                            cepat, tertib, dan ramah; belum konsisten.</td>
                                        <td class="krit">Belum melayani kebutuhan administrasi warga sekolah dengan cepat,
                                            tertib, dan ramah setelah mengikuti pelatihan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">36</td>
                                        <td class="kat">Dokumen dan laporan</td>
                                        <td class="krit">Selalu menyusun dokumen administrasi dan laporan tepat waktu dan
                                            sesuai format dan telah menjadi kebiasaan kerja.</td>
                                        <td class="krit">Sering menyusun dokumen administrasi dan laporan tepat waktu dan
                                            sesuai format; sesekali masih terlewat.</td>
                                        <td class="krit">Kadang-kadang menyusun dokumen administrasi dan laporan tepat waktu
                                            dan sesuai format; belum konsisten.</td>
                                        <td class="krit">Belum menyusun dokumen administrasi dan laporan tepat waktu dan
                                            sesuai format setelah mengikuti pelatihan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">37</td>
                                        <td class="kat">Kolaborasi</td>
                                        <td class="krit">Selalu berkolaborasi aktif dengan kepala sekolah, guru, rekan, dan
                                            pihak luar dan telah menjadi kebiasaan kerja.</td>
                                        <td class="krit">Sering berkolaborasi aktif dengan kepala sekolah, guru, rekan, dan
                                            pihak luar; sesekali masih terlewat.</td>
                                        <td class="krit">Kadang-kadang berkolaborasi aktif dengan kepala sekolah, guru,
                                            rekan, dan pihak luar; belum konsisten.</td>
                                        <td class="krit">Belum berkolaborasi aktif dengan kepala sekolah, guru, rekan, dan
                                            pihak luar setelah mengikuti pelatihan.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">38</td>
                                        <td class="kat">Teknologi dan keamanan data</td>
                                        <td class="krit">Selalu memanfaatkan teknologi dan menjaga keamanan serta
                                            kerahasiaan data sekolah dan telah menjadi kebiasaan kerja.</td>
                                        <td class="krit">Sering memanfaatkan teknologi dan menjaga keamanan serta
                                            kerahasiaan data sekolah; sesekali masih terlewat.</td>
                                        <td class="krit">Kadang-kadang memanfaatkan teknologi dan menjaga keamanan serta
                                            kerahasiaan data sekolah; belum konsisten.</td>
                                        <td class="krit">Belum memanfaatkan teknologi dan menjaga keamanan serta kerahasiaan
                                            data sekolah setelah mengikuti pelatihan.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </details>
            </section>

            <section class="d-card" data-level-section="4">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">Level IV — Hasil</h2>
                        <p class="d-card-s">Dampak pelatihan terhadap layanan dan kinerja sekolah.</p>
                    </div>
                    <span class="d-badge" style="background:#fef3c7;color:#b45309">5 indikator</span>
                </div>

                <div style="overflow-x:auto">
                    <table class="d-table" style="min-width:900px">
                        <thead>
                            <tr>
                                <th class="center" style="width:80px">No</th>
                                <th>Pertanyaan / Indikator</th>
                                <th class="center" style="width:80px">1</th>
                                <th class="center" style="width:80px">2</th>
                                <th class="center" style="width:80px">3</th>
                                <th class="center" style="width:80px">4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-data">
                                <td class="txt">39</td>
                                <td class="q">
                                    Data sekolah menjadi lebih akurat, lengkap, dan mutakhir dibandingkan sebelum pelatihan.
                                    <i class="d-star">*</i>
                                    @error('jawaban_39')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_39" value="1"
                                        @checked((string) old('jawaban_39', $tendik->jawaban_39) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_39" value="2"
                                        @checked((string) old('jawaban_39', $tendik->jawaban_39) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_39" value="3"
                                        @checked((string) old('jawaban_39', $tendik->jawaban_39) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_39" value="4"
                                        @checked((string) old('jawaban_39', $tendik->jawaban_39) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">40</td>
                                <td class="q">
                                    Waktu penyelesaian layanan administrasi menjadi lebih singkat dan keluhan layanan
                                    berkurang. <i class="d-star">*</i>
                                    @error('jawaban_40')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_40" value="1"
                                        @checked((string) old('jawaban_40', $tendik->jawaban_40) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_40" value="2"
                                        @checked((string) old('jawaban_40', $tendik->jawaban_40) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_40" value="3"
                                        @checked((string) old('jawaban_40', $tendik->jawaban_40) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_40" value="4"
                                        @checked((string) old('jawaban_40', $tendik->jawaban_40) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">41</td>
                                <td class="q">
                                    Kesalahan dan temuan pada laporan administrasi maupun keuangan berkurang. <i
                                        class="d-star">*</i>
                                    @error('jawaban_41')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_41" value="1"
                                        @checked((string) old('jawaban_41', $tendik->jawaban_41) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_41" value="2"
                                        @checked((string) old('jawaban_41', $tendik->jawaban_41) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_41" value="3"
                                        @checked((string) old('jawaban_41', $tendik->jawaban_41) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_41" value="4"
                                        @checked((string) old('jawaban_41', $tendik->jawaban_41) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">42</td>
                                <td class="q">
                                    Kerja sama tim dan koordinasi antarwarga sekolah menjadi lebih baik. <i
                                        class="d-star">*</i>
                                    @error('jawaban_42')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_42" value="1"
                                        @checked((string) old('jawaban_42', $tendik->jawaban_42) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_42" value="2"
                                        @checked((string) old('jawaban_42', $tendik->jawaban_42) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_42" value="3"
                                        @checked((string) old('jawaban_42', $tendik->jawaban_42) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_42" value="4"
                                        @checked((string) old('jawaban_42', $tendik->jawaban_42) === '4') required
                                        class="d-radio"></td>
                            </tr>

                            <tr class="d-data">
                                <td class="txt">43</td>
                                <td class="q">
                                    Pelatihan memberi dampak positif pada mutu layanan dan kinerja sekolah secara
                                    keseluruhan. <i class="d-star">*</i>
                                    @error('jawaban_43')
                                        <p class="d-err">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="text-align:center"><input type="radio" name="jawaban_43" value="1"
                                        @checked((string) old('jawaban_43', $tendik->jawaban_43) === '1') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_43" value="2"
                                        @checked((string) old('jawaban_43', $tendik->jawaban_43) === '2') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_43" value="3"
                                        @checked((string) old('jawaban_43', $tendik->jawaban_43) === '3') required
                                        class="d-radio"></td>
                                <td style="text-align:center"><input type="radio" name="jawaban_43" value="4"
                                        @checked((string) old('jawaban_43', $tendik->jawaban_43) === '4') required
                                        class="d-radio"></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <p class="d-table-foot">Pilih satu skor untuk setiap indikator.</p>

                <details class="d-details">
                    <summary>
                        <div class="d-sum-l">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                style="flex-shrink:0;margin-top:2px;color:var(--p-600)">
                                <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                            <div style="min-width:0">
                                <h3 class="d-card-h" style="font-size:14px">Rubrik Penilaian Level IV — Hasil</h3>
                                <p class="d-card-s" style="line-height:1.7">Makna skor 1–4 untuk setiap indikator pada Level
                                    IV (Hasil). Klik untuk melihat atau menyembunyikan.</p>
                            </div>
                        </div>
                        <svg class="d-chev" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>

                    <div class="d-rubrik-inner">
                        <div class="d-rubrik-box">
                            <table class="d-table" style="min-width:960px">
                                <thead>
                                    <tr>
                                        <th class="center" style="width:80px">No</th>
                                        <th style="width:176px">Indikator</th>
                                        <th>Skor 4 (Sangat Baik)</th>
                                        <th>Skor 3 (Baik)</th>
                                        <th>Skor 2 (Cukup)</th>
                                        <th>Skor 1 (Kurang)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="txt">39</td>
                                        <td class="kat">Kualitas data</td>
                                        <td class="krit">Keakuratan, kelengkapan, dan kemutakhiran data sekolah meningkat
                                            sangat jelas dan didukung bukti/dokumen.</td>
                                        <td class="krit">Keakuratan, kelengkapan, dan kemutakhiran data sekolah meningkat
                                            dan dapat diamati.</td>
                                        <td class="krit">Keakuratan, kelengkapan, dan kemutakhiran data sekolah meningkat
                                            sedikit atau belum merata.</td>
                                        <td class="krit">Keakuratan, kelengkapan, dan kemutakhiran data sekolah belum
                                            berubah atau justru menurun.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">40</td>
                                        <td class="kat">Kecepatan layanan</td>
                                        <td class="krit">Kecepatan layanan administrasi dan berkurangnya keluhan layanan
                                            meningkat sangat jelas dan didukung bukti/dokumen.</td>
                                        <td class="krit">Kecepatan layanan administrasi dan berkurangnya keluhan layanan
                                            meningkat dan dapat diamati.</td>
                                        <td class="krit">Kecepatan layanan administrasi dan berkurangnya keluhan layanan
                                            meningkat sedikit atau belum merata.</td>
                                        <td class="krit">Kecepatan layanan administrasi dan berkurangnya keluhan layanan
                                            belum berubah atau justru menurun.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">41</td>
                                        <td class="kat">Mutu laporan</td>
                                        <td class="krit">Mutu laporan administrasi dan keuangan (berkurangnya kesalahan dan
                                            temuan) meningkat sangat jelas dan didukung bukti/dokumen.</td>
                                        <td class="krit">Mutu laporan administrasi dan keuangan (berkurangnya kesalahan dan
                                            temuan) meningkat dan dapat diamati.</td>
                                        <td class="krit">Mutu laporan administrasi dan keuangan (berkurangnya kesalahan dan
                                            temuan) meningkat sedikit atau belum merata.</td>
                                        <td class="krit">Mutu laporan administrasi dan keuangan (berkurangnya kesalahan dan
                                            temuan) belum berubah atau justru menurun.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">42</td>
                                        <td class="kat">Kerja sama tim</td>
                                        <td class="krit">Kerja sama tim dan koordinasi antarwarga sekolah meningkat sangat
                                            jelas dan didukung bukti/dokumen.</td>
                                        <td class="krit">Kerja sama tim dan koordinasi antarwarga sekolah meningkat dan
                                            dapat diamati.</td>
                                        <td class="krit">Kerja sama tim dan koordinasi antarwarga sekolah meningkat sedikit
                                            atau belum merata.</td>
                                        <td class="krit">Kerja sama tim dan koordinasi antarwarga sekolah belum berubah atau
                                            justru menurun.</td>
                                    </tr>
                                    <tr>
                                        <td class="txt">43</td>
                                        <td class="kat">Kinerja sekolah</td>
                                        <td class="krit">Mutu layanan dan kinerja sekolah secara keseluruhan meningkat
                                            sangat jelas dan didukung bukti/dokumen.</td>
                                        <td class="krit">Mutu layanan dan kinerja sekolah secara keseluruhan meningkat dan
                                            dapat diamati.</td>
                                        <td class="krit">Mutu layanan dan kinerja sekolah secara keseluruhan meningkat
                                            sedikit atau belum merata.</td>
                                        <td class="krit">Mutu layanan dan kinerja sekolah secara keseluruhan belum berubah
                                            atau justru menurun.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </details>
            </section>


            <div class="d-foot">
                <button type="submit" class="d-pbtn b-mint">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        <path d="M17 21v-8H7v8M7 3v5h8" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const jabatan = document.getElementById('jabatan_responden');
            const lainnyaWrap = document.getElementById('jabatan-lainnya-wrap');
            const lainnyaInput = document.getElementById('jabatan_lainnya');

            const levelSections = document.querySelectorAll('[data-level-section]');

            function updateLevelJabatan() {
                if (!jabatan) return;

                const isTendik = ['Tendik', 'Operator', 'Bendahara'].includes(jabatan.value);

                levelSections.forEach(function (section) {
                    const level = Number(section.dataset.levelSection);
                    const tampil = isTendik || (level === 3 || level === 4);

                    section.hidden = !tampil;

                    section.querySelectorAll('input[type="radio"]').forEach(function (radio) {
                        radio.disabled = !tampil;

                        if (!tampil) {
                            radio.checked = false;
                        }
                    });
                });

                if (lainnyaWrap) {
                    const tampilLainnya = jabatan.value === 'Lainnya';
                    lainnyaWrap.style.display = tampilLainnya ? '' : 'none';
                    if (lainnyaInput) {
                        lainnyaInput.required = tampilLainnya;
                        if (!tampilLainnya) lainnyaInput.value = '';
                    }
                }

                updateTendikProgress();
            }

            function updateTendikProgress() {
                const radioAktif = Array.from(
                    document.querySelectorAll(
                        'input[type="radio"][name^="jawaban_"]:not(:disabled)'
                    )
                );

                const namaIndikator = new Set(
                    radioAktif.map(function (radio) {
                        return radio.name;
                    })
                );

                const totalIndikator = namaIndikator.size;

                const checked = radioAktif.filter(function (radio) {
                    return radio.checked;
                });

                const jumlahDiisi = checked.length;
                const totalSkor = checked.reduce(function (total, radio) {
                    return total + Number(radio.value);
                }, 0);

                const persen = totalIndikator > 0
                    ? Math.round((jumlahDiisi / totalIndikator) * 100)
                    : 0;

                const progressBar = document.getElementById('tendik-progress-bar');
                const progressPercent = document.getElementById('tendik-progress-percent');
                const progressText = document.getElementById('tendik-progress-text');
                const scoreText = document.getElementById('tendik-score-text');

                if (progressBar) {
                    progressBar.style.width = persen + '%';
                }

                if (progressPercent) {
                    progressPercent.textContent = persen + '%';
                }

                if (progressText) {
                    progressText.textContent =
                        jumlahDiisi + ' / ' + totalIndikator + ' butir';
                }

                if (scoreText) {
                    if (jumlahDiisi === 0) {
                        scoreText.textContent = 'Belum ada penilaian';
                    } else {
                        scoreText.textContent =
                            totalSkor + ' / ' + (totalIndikator * 4) + ' poin';
                    }
                }
            }

            document.querySelectorAll(
                'input[type="radio"][name^="jawaban_"]'
            ).forEach(function (radio) {
                radio.addEventListener('change', updateTendikProgress);
            });

            if (jabatan) {
                jabatan.addEventListener('change', updateLevelJabatan);
            }

            updateLevelJabatan();
        });
    </script>
@endsection