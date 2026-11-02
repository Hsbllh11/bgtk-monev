@extends('layouts.app')

@section('title', 'Edit Instrumen BK')

@section('page-title', 'Edit Instrumen BK')

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

        .d-pbtn:disabled {
            opacity: .7;
            cursor: not-allowed;
            transform: none;
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

        .d-note ol {
            margin: 4px 0 0;
            padding-left: 20px;
            list-style: decimal;
        }

        .d-note li+li {
            margin-top: 2px;
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

        textarea.d-field {
            height: auto;
            min-height: 120px;
            padding: 12px 14px;
            line-height: 1.7;
            resize: vertical;
        }

        .d-essay {
            display: flex;
            flex-direction: column;
            gap: 18px;
            padding: 6px 20px 22px;
        }
    </style>

    <div class="d-wrap">

        {{-- =========================================================
        HEADER
        ========================================================== --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Edit Instrumen Monev <b>BK</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.index') }}">Instrumen</a>
                        &nbsp;›&nbsp; Edit BK Instrumen
                    </p>
                    <p class="d-desc">
                        Perbarui data identitas, lokasi, dan jawaban BK.
                    </p>
                </div>

                {{-- Kembali --}}
                <a href="{{ route('bk.show', $submission) }}" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </section>

        {{-- =========================================================
        PETUNJUK + PROGRESS (satu kartu)
        ========================================================== --}}
        <div class="d-card">
            <div class="d-info-card">

                {{-- ===================== KIRI: PETUNJUK ===================== --}}
                <div class="d-info-main">
                    <div class="d-info-head">
                        <div class="d-info-ico">
                            <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>

                        <div style="min-width:0">
                            <h2 class="d-card-h">Instrumen Monitoring dan Evaluasi BK</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Monitoring dan Evaluasi Diseminasi Implementasi 7 Jurus BK Hebat.
                            </p>
                        </div>
                    </div>

                    <div class="d-note">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                            <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>

                        <div>
                            <b class="t">Petunjuk pengisian</b>

                            <ol>
                                <li>
                                    Isilah instrumen sesuai dengan fakta yang diketahui,
                                    dialami, dilakukan, dan dirasakan.
                                </li>

                                <li>
                                    Bacalah setiap pernyataan pada Bagian A dengan cermat,
                                    kemudian pilih skor <strong>1, 2, 3, atau 4</strong> sesuai tingkat ketercapaian kondisi riil di lapangan.
                                </li>

                                <li>
                                    Bacalah setiap pertanyaan pada Bagian B dan tuliskan
                                    jawaban secara singkat, padat, dan jelas.
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                {{-- ===================== KANAN: PROGRES ===================== --}}
                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres pengisian</span>
                        <span id="progressPercent" class="d-prog-pct">0%</span>
                    </div>

                    <div class="d-bar">
                        <div id="progressBar" style="width: 0%"></div>
                    </div>

                    <div class="d-prog-row" style="margin-top:10px">
                        <span class="d-prog-val">
                            <span id="answeredCount">0</span> / {{ $questions->count() }} butir
                        </span>

                        <span class="d-prog-label" style="font-weight:500">Terjawab</span>
                    </div>

                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="jawabanSummary" class="d-prog-val" style="margin-top:4px">
                            Belum ada jawaban
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- =========================================================
        ERROR VALIDATION
        ========================================================== --}}
        @if ($errors->any())

            <div class="d-error">

                <b>Pengisian belum dapat disimpan.</b>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>

                            {{ $error }}

                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        {{-- =========================================================
        FORM
        ========================================================== --}}
        <form id="bkEditForm" action="{{ route('bk.update', $submission) }}" method="POST" class="d-form">

            @csrf
            @method('PUT')

            {{-- =====================================================
            1. IDENTITAS PETUGAS MONEV
            ====================================================== --}}
            <section class="d-card">

                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Petugas Monev</h2>
                        <p class="d-card-s">Informasi petugas pelaksana monitoring dan evaluasi.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">

                    {{-- Nama Petugas --}}
                    <div>
                        <label for="nama_petugas_monev" class="d-label">
                            Nama Petugas Monev <i>*</i>
                        </label>

                        <input type="text" id="nama_petugas_monev" name="nama_petugas_monev"
                            value="{{ old('nama_petugas_monev', $submission->nama_petugas_monev) }}" required
                            placeholder="Masukkan nama petugas" class="d-field">
                    </div>

                    {{-- Instansi --}}
                    <div>
                        <label for="instansi_petugas" class="d-label">
                            Instansi
                        </label>

                        <input type="text" id="instansi_petugas" name="instansi_petugas"
                            value="{{ old('instansi_petugas', $submission->instansi_petugas) }}"
                            placeholder="Masukkan instansi" class="d-field">
                    </div>

                    {{-- Lokasi --}}
                    <div>
                        <label for="lokasi_monev" class="d-label">
                            Lokasi Monev
                        </label>

                        <input type="text" id="lokasi_monev" name="lokasi_monev"
                            value="{{ old('lokasi_monev', $submission->lokasi_monev) }}" placeholder="Masukkan lokasi Monev"
                            class="d-field">
                    </div>

                    {{-- Tanggal --}}
                    <div>
                        <label for="tanggal_pelaksanaan" class="d-label">
                            Tanggal Pelaksanaan
                        </label>

                        <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                            value="{{ old('tanggal_pelaksanaan', optional($submission->tanggal_pelaksanaan)->format('Y-m-d')) }}"
                            class="d-field">
                    </div>

                </div>

            </section>

            {{-- =====================================================
            2. IDENTITAS RESPONDEN
            ====================================================== --}}
            <section class="d-card">

                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Identitas Responden</h2>
                        <p class="d-card-s">Identitas responden yang mengisi instrumen BK.</p>
                    </div>
                </div>

                <div class="d-form-grid c2">
                    <div>
                        <label for="nama_responden" class="d-label">Nama Responden <i>*</i></label>
                        <input type="text" id="nama_responden" name="nama_responden"
                            value="{{ old('nama_responden', $submission->nama_responden) }}" required maxlength="255"
                            placeholder="Masukkan nama responden" class="d-field">
                    </div>

                    <div>
                        <label for="jabatan_responden" class="d-label">Jabatan Responden <i>*</i></label>
                        <select id="jabatan_responden" name="jabatan_responden" required class="d-field">
                            <option value="">Pilih jabatan</option>
                            <option value="BK" @selected(old('jabatan_responden', $submission->jabatan_responden) === 'BK')>BK
                            </option>
                            <option value="Kepala Sekolah" @selected(old('jabatan_responden', $submission->jabatan_responden) === 'Kepala Sekolah')>Kepala Sekolah</option>
                            <option value="Rekan Sejawat" @selected(old('jabatan_responden', $submission->jabatan_responden) === 'Rekan Sejawat')>Rekan Sejawat</option>
                            <option value="Peserta Didik" @selected(old('jabatan_responden', $submission->jabatan_responden) === 'Peserta Didik')>Peserta Didik</option>
                        </select>
                    </div>

                    <div id="jabatanLainnyaWrapper"
                        class="{{ old('jabatan_responden', $submission->jabatan_responden) === 'Lainnya' ? '' : 'hidden' }}">
                        <label for="jabatan_lainnya" class="d-label">Jabatan Lainnya <i>*</i></label>
                        <input type="text" id="jabatan_lainnya" name="jabatan_lainnya"
                            value="{{ old('jabatan_lainnya', $submission->jabatan_lainnya) }}" maxlength="255"
                            placeholder="Tuliskan jabatan responden" class="d-field">
                    </div>

                    <div>
                        <label for="satuan_pendidikan" class="d-label">Satuan Pendidikan <i>*</i></label>
                        <input type="text" id="satuan_pendidikan" name="satuan_pendidikan"
                            value="{{ old('satuan_pendidikan', $submission->satuan_pendidikan) }}" required
                            maxlength="255" placeholder="Masukkan nama satuan pendidikan" class="d-field">
                    </div>

                    <div>
                        <label for="masa_kerja" class="d-label">Masa Kerja (tahun) <i>*</i></label>
                        <input type="number" id="masa_kerja" name="masa_kerja"
                            value="{{ old('masa_kerja', $submission->masa_kerja) }}" required min="0" max="100" step="1"
                            placeholder="Contoh: 5" class="d-field">
                    </div>

                    <div>
                        <label for="nama_pelatihan" class="d-label">Nama Pelatihan <i>*</i></label>
                        <input type="text" id="nama_pelatihan" name="nama_pelatihan"
                            value="{{ old('nama_pelatihan', $submission->nama_pelatihan) }}" required maxlength="255"
                            placeholder="Masukkan nama pelatihan" class="d-field">
                    </div>

                    <div>
                        <label for="tanggal_pengisian" class="d-label">Tanggal Pengisian <i>*</i></label>
                        <input type="date" id="tanggal_pengisian" name="tanggal_pengisian"
                            value="{{ old('tanggal_pengisian', optional($submission->tanggal_pengisian)->format('Y-m-d')) }}"
                            required class="d-field">
                    </div>
                </div>
            </section>

            {{-- =====================================================
            3. BAGIAN A — TABEL PERTANYAAN (dipindah ke partial)
            ====================================================== --}}
            @include('bk.partials.tabel-pertanyaan', ['answers' => $answers])

            {{-- =====================================================
            PERTANYAAN URAIAN
            ====================================================== --}}
            @if ($essayAnswers->count() > 0)

                <section class="d-card">

                    <div class="d-card-top">
                        <div>
                            <h2 class="d-card-h">Pertanyaan Uraian</h2>
                            <p class="d-card-s">Perbarui jawaban uraian jika diperlukan.</p>
                        </div>
                    </div>

                    <div class="d-essay">

                        @foreach ($essayAnswers as $essay)

                            <div>

                                <label class="d-label">
                                    {{ $essay->nomor }}.
                                    {{ $essay->pertanyaan }}
                                </label>

                                <textarea name="essay[{{ $essay->nomor }}][pertanyaan]"
                                    class="hidden">{{ $essay->pertanyaan }}</textarea>

                                <textarea name="essay[{{ $essay->nomor }}][jawaban]" rows="5"
                                    class="d-field">{{ old("essay.{$essay->nomor}.jawaban", $essay->jawaban) }}</textarea>

                            </div>

                        @endforeach

                    </div>

                </section>

            @endif

            {{-- =====================================================
            TOMBOL
            ====================================================== --}}
            <div class="d-foot">

                <button id="submitButton" type="submit" class="d-pbtn b-mint">
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

    {{-- =========================================================
    JAVASCRIPT
    ========================================================== --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('bkEditForm');
            const jabatanSelect = document.getElementById('jabatan_responden');

            const questions = Array.from(
                document.querySelectorAll('.question-item')
            );

            const levelHeaders = document.querySelectorAll('.level-header');
            const bagianHeaders = document.querySelectorAll('.bagian-header');

            const answeredCount = document.getElementById('answeredCount');
            const progressBar = document.getElementById('progressBar');
            const progressPercent = document.getElementById('progressPercent');
            const jawabanSummary = document.getElementById('jawabanSummary');
            const submitButton = document.getElementById('submitButton');

            function getAllowedLevels() {
                const jabatan = jabatanSelect.value;

                if (jabatan === 'BK') {
                    return [1, 2, 3, 4];
                }

                if (jabatan !== '') {
                    return [3, 4];
                }

                // Sebelum jabatan dipilih, pertahankan tampilan awal.
                return [1, 2, 3, 4];
            }

            function updateVisibleLevels() {
                const allowedLevels = getAllowedLevels();

                function levelIsAllowed(element) {
                    return allowedLevels.includes(
                        Number(element.dataset.level)
                    );
                }

                levelHeaders.forEach(function (row) {
                    row.hidden = !levelIsAllowed(row);
                });

                bagianHeaders.forEach(function (row) {
                    row.hidden = !levelIsAllowed(row);
                });

                questions.forEach(function (row) {
                    const visible = levelIsAllowed(row);
                    row.hidden = !visible;

                    row.querySelectorAll('input[type="radio"]').forEach(function (radio) {
                        radio.disabled = !visible;
                    });
                });

                updateProgress();
            }

            function updateProgress() {
                let answered = 0;
                let totalSkor = 0;

                const visibleQuestions = questions.filter(function (question) {
                    return !question.hidden;
                });

                visibleQuestions.forEach(function (question) {
                    const checked = question.querySelector('input[type="radio"]:checked');

                    if (checked) {
                        answered++;
                        totalSkor += Number(checked.value);
                    }
                });

                const total = visibleQuestions.length;
                const percentage = total > 0 ? Math.round((answered / total) * 100) : 0;

                answeredCount.textContent = answered;

                const totalLabel = answeredCount.parentElement;
                if (totalLabel) {
                    Array.from(totalLabel.childNodes).forEach(function (node) {
                        if (node.nodeType === Node.TEXT_NODE && node.textContent.includes('/ ')) {
                            node.textContent = ' / ' + total + ' butir';
                        }
                    });
                }

                progressBar.style.width = percentage + '%';
                progressPercent.textContent = percentage + '%';

                jawabanSummary.textContent = answered > 0
                    ? totalSkor + ' / ' + (total * 4) + ' poin'
                    : 'Belum ada jawaban';
            }

            form.addEventListener('change', function (event) {
                if (
                    event.target.matches('input[type="radio"]') ||
                    event.target === jabatanSelect
                ) {
                    updateVisibleLevels();
                }
            });

            jabatanSelect.addEventListener('change', updateVisibleLevels);

            form.addEventListener('submit', function (event) {
                updateVisibleLevels();

                const unanswered = questions.filter(function (question) {
                    if (question.hidden) {
                        return false;
                    }

                    return !question.querySelector(
                        'input[type="radio"]:checked'
                    );
                });

                if (!jabatanSelect.value) {
                    event.preventDefault();
                    alert('Silakan pilih jabatan responden terlebih dahulu.');
                    jabatanSelect.focus();
                    return;
                }

                if (unanswered.length > 0) {
                    event.preventDefault();

                    const firstQuestion = unanswered[0];

                    firstQuestion.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    firstQuestion.classList.add('bg-red-50');

                    setTimeout(function () {
                        firstQuestion.classList.remove('bg-red-50');
                    }, 2500);

                    alert(
                        'Masih ada ' +
                        unanswered.length +
                        ' pernyataan yang belum dijawab.'
                    );

                    return;
                }

                submitButton.disabled = true;
                submitButton.textContent = 'Menyimpan...';
            });

            updateVisibleLevels();
        });
    </script>

@endsection