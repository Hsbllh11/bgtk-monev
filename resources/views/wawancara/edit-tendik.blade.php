@extends('layouts.app')

@section('title', 'Edit Wawancara TENDIK')
@section('page-title', 'Edit Wawancara TENDIK')

@section('content')
    @php
        $metadata = $metadata ?? [];

        $pertanyaan = [
            1 => '(Reaksi) Hal apa dari substansi materi, fasilitator, maupun layanan penyelenggaraan yang menurut Anda paling bermanfaat dan berkesan? Mengapa?',
            2 => '(Belajar) Pengetahuan, keterampilan, atau sikap baru apa yang Anda kuasai setelah pelatihan (termasuk growth mindset dan profesionalisme), dan materi apa yang masih perlu diperdalam?',
            3 => '(Perilaku) Berikan contoh nyata penerapan hasil pelatihan dalam pekerjaan Anda sehari-hari.',
            4 => '(Perilaku) Kendala apa yang Anda hadapi dalam menerapkan hasil pelatihan, dan dukungan apa yang Anda perlukan?',
            5 => '(Hasil) Perubahan atau dampak apa yang terlihat di sekolah setelah pelatihan, dan apa saran Anda untuk perbaikan program berikutnya?',
        ];

        $jumlahPertanyaan = count($pertanyaan);

        $pilihanJabatan = [
            'Tendik',
            'Operator',
            'Bendahara',
            'Kepala Sekolah',
            'Rekan Sejawat/Guru',
        ];

        $jabatanSaatIni = old(
            'jabatan_responden',
            data_get($metadata, 'jabatan_responden')
            ?: $wawancara->status_responden
            ?: $wawancara->jabatan_narasumber
        );

        // Normalisasi jabatan dari data lama ke pilihan yang tersedia.
        $normalisasiJabatan = [
            'Operator Sekolah' => 'Operator',
            'Bendahara Sekolah' => 'Bendahara',
            'Rekan Sejawat' => 'Rekan Sejawat/Guru',
            'Guru' => 'Rekan Sejawat/Guru',
        ];

        $jabatanSaatIni = $normalisasiJabatan[$jabatanSaatIni] ?? $jabatanSaatIni;

        if (!in_array($jabatanSaatIni, $pilihanJabatan, true)) {
            $jabatanSaatIni = '';
        }

        $tanggalPelaksanaanAwal = old(
            'tanggal_pelaksanaan',
            data_get($metadata, 'tanggal_pelaksanaan')
            ?: $wawancara->tanggal_evaluasi
            ?: $wawancara->tanggal_wawancara
        );

        $tanggalPelaksanaan = $tanggalPelaksanaanAwal
            ? \Illuminate\Support\Carbon::parse($tanggalPelaksanaanAwal)->format('Y-m-d')
            : now()->format('Y-m-d');

        $tanggalPengisianAwal = old('tanggal_wawancara', $wawancara->tanggal_wawancara);

        $tanggalPengisian = $tanggalPengisianAwal
            ? \Illuminate\Support\Carbon::parse($tanggalPengisianAwal)->format('Y-m-d')
            : now()->format('Y-m-d');

        $namaPetugas = old(
            'nama_petugas_monev',
            $wawancara->nama_petugas_monev ?? $wawancara->nama_pewawancara
        );

        $instansiPetugas = old(
            'instansi_petugas',
            data_get($metadata, 'instansi_petugas')
            ?: $wawancara->unit_kerja_petugas
        );

        $lokasiMonev = old(
            'lokasi_monev',
            data_get($metadata, 'lokasi_monev', '')
        );

        $namaResponden = old(
            'nama_responden',
            $wawancara->nama_responden ?? $wawancara->nama_narasumber
        );

        $satuanPendidikan = old(
            'satuan_pendidikan',
            data_get($metadata, 'satuan_pendidikan')
            ?: $wawancara->unit_kerja_responden
            ?: $wawancara->sekolah?->nama_sekolah
        );

        $masaKerja = old(
            'masa_kerja',
            data_get($metadata, 'masa_kerja', '')
        );

        $namaPelatihan = old(
            'nama_pelatihan',
            data_get($metadata, 'nama_pelatihan')
            ?: data_get($metadata, 'nama_kegiatan', '')
        );
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

        .d-q-text {
            display: block;
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
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Edit Wawancara <b>TENDIK</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('wawancara.index') }}">Wawancara</a>
                        &nbsp;›&nbsp; Edit Wawancara TENDIK
                    </p>
                    <p class="d-desc">Perbarui identitas petugas, identitas responden, dan hasil wawancara.</p>
                </div>

                {{-- Kembali --}}
                <a href="{{ route('wawancara.show', $wawancara->id) }}" class="d-pbtn b-blue back">
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
                            <h2 class="d-card-h">Instrumen Wawancara TENDIK</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Instrumen ini digunakan untuk menggali pengalaman dan implementasi hasil
                                pelatihan Tenaga Kependidikan (TENDIK) melalui lima pertanyaan esai.
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
                            Periksa identitas dan perbarui jawaban berdasarkan hasil wawancara dengan responden
                            secara jelas dan sesuai fakta. Tanda bintang (*) menunjukkan kolom wajib diisi.
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
                        <span id="wawancara-progress-text" class="d-prog-val">0 / {{ $jumlahPertanyaan }} jawaban</span>
                        <span class="d-prog-label" style="font-weight:500">Wawancara</span>
                    </div>
                </div>

            </div>
        </div>

        {{-- ================= VALIDATION ERROR ================= --}}
        @if ($errors->any())
            <div class="d-error">
                <b>Data belum dapat disimpan:</b>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ================= FORM UTAMA ================= --}}
        <form action="{{ route('wawancara.update', $wawancara->id) }}" method="POST" class="d-form">

            @csrf
            @method('PUT')

            {{-- A. IDENTITAS PETUGAS MONEV --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Petugas Monev</h2>
                        <p class="d-card-s">Informasi petugas yang melaksanakan monitoring dan evaluasi.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    <div>
                        <label for="nama_petugas_monev" class="d-label">Nama Petugas Monev <i>*</i></label>
                        <input id="nama_petugas_monev" name="nama_petugas_monev" type="text" value="{{ $namaPetugas }}"
                            required maxlength="255" placeholder="Masukkan nama petugas" class="d-field">
                        @error('nama_petugas_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="instansi_petugas" class="d-label">Instansi Petugas <i>*</i></label>
                        <input id="instansi_petugas" name="instansi_petugas" type="text" value="{{ $instansiPetugas }}"
                            required maxlength="255" placeholder="Contoh: BGTK Provinsi NTB" class="d-field">
                        @error('instansi_petugas')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="lokasi_monev" class="d-label">Lokasi Monev <i>*</i></label>
                        <input id="lokasi_monev" name="lokasi_monev" type="text" value="{{ $lokasiMonev }}" required
                            maxlength="255" placeholder="Masukkan lokasi Monev" class="d-field">
                        @error('lokasi_monev')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_pelaksanaan" class="d-label">Tanggal Pelaksanaan <i>*</i></label>
                        <input id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" type="date"
                            value="{{ $tanggalPelaksanaan }}" required class="d-field">
                        @error('tanggal_pelaksanaan')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- B. IDENTITAS RESPONDEN --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Identitas Responden</h2>
                        <p class="d-card-s">Informasi pihak yang memberikan jawaban wawancara.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    <div>
                        <label for="nama_responden" class="d-label">Nama Responden <i>*</i></label>
                        <input id="nama_responden" name="nama_responden" type="text" value="{{ $namaResponden }}" required
                            maxlength="255" placeholder="Masukkan nama responden" class="d-field">
                        @error('nama_responden')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jabatan_responden" class="d-label">Jabatan Responden <i>*</i></label>
                        <select id="jabatan_responden" name="jabatan_responden" required class="d-field">
                            <option value="" disabled @selected($jabatanSaatIni === '')>Pilih jabatan</option>
                            @foreach ($pilihanJabatan as $pilihan)
                                <option value="{{ $pilihan }}" @selected($jabatanSaatIni === $pilihan)>
                                    {{ $pilihan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jabatan_responden')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="satuan_pendidikan" class="d-label">Satuan Pendidikan <i>*</i></label>
                        <input id="satuan_pendidikan" name="satuan_pendidikan" type="text" value="{{ $satuanPendidikan }}"
                            required maxlength="255" placeholder="Nama sekolah atau satuan pendidikan" class="d-field">
                        @error('satuan_pendidikan')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="masa_kerja" class="d-label">Masa Kerja (tahun) <i>*</i></label>
                        <input id="masa_kerja" name="masa_kerja" type="number" min="0" max="100" step="0.5"
                            value="{{ $masaKerja }}" required placeholder="Contoh: 5 atau 5.5" class="d-field">
                        @error('masa_kerja')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nama_pelatihan" class="d-label">Nama Kegiatan/Pelatihan <i>*</i></label>
                        <input id="nama_pelatihan" name="nama_pelatihan" type="text" value="{{ $namaPelatihan }}" required
                            maxlength="255" placeholder="Masukkan nama kegiatan atau pelatihan" class="d-field">
                        @error('nama_pelatihan')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_wawancara" class="d-label">Tanggal Pengisian <i>*</i></label>
                        <input id="tanggal_wawancara" name="tanggal_wawancara" type="date" value="{{ $tanggalPengisian }}"
                            required class="d-field">
                        @error('tanggal_wawancara')
                            <p class="d-err">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </section>

            {{-- C. HASIL WAWANCARA TENDIK --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">C. Hasil Wawancara TENDIK</h2>
                        <p class="d-card-s">
                            Jawablah berdasarkan pengalaman setelah mengikuti pelatihan. Seluruh pertanyaan wajib diisi.
                        </p>
                    </div>

                    <span class="d-badge" style="background:#dbeafe;color:#1d4ed8">{{ $jumlahPertanyaan }} pertanyaan</span>
                </div>

                <div>
                    @foreach ($pertanyaan as $nomor => $teks)
                        <div class="d-q-item">
                            <div class="d-q-head">
                                <span class="d-q-no">{{ $nomor }}</span>

                                <label for="jawaban_{{ $nomor }}" class="d-q-text">
                                    {{ $teks }} <i>*</i>
                                </label>
                            </div>

                            <textarea id="jawaban_{{ $nomor }}" name="jawaban_{{ $nomor }}" rows="5" required
                                placeholder="Tuliskan jawaban Anda secara jelas dan lengkap..." class="d-field"
                                data-wawancara-jawaban>{{ old('jawaban_' . $nomor, $wawancara->{'jawaban_' . $nomor}) }}</textarea>

                            @error('jawaban_' . $nomor)
                                <p class="d-err">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- ================= TOMBOL SIMPAN ================= --}}
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