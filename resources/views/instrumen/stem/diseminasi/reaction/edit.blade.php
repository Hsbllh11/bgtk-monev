{{-- resources/views/instrumen/stem/diseminasi/reaction/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Instrumen Reaction')
@section('page-title', 'Edit Instrumen Reaction')

@section('content')

    @php
        $reactionQs = [
            'Evaluasi Program' => [
                'Kesesuaian program kegiatan dengan tujuan pelatihan',
                'Kesesuaian bahan ajar dengan struktur program',
                'Kesesuaian alokasi materi dengan bobot materi',
                'Relevansi materi dengan kebutuhan peserta pelatihan dalam mendukung pelaksanaan tugas pendidik',
                'Manfaat materi pelatihan dalam meningkatkan kompetensi peserta'
            ],
            'Sarana dan Prasarana Penunjang Kegiatan' => [
                'Kesiapan dan ketersediaan sarana kegiatan [audio visual, LCD/laptop, papan putih, pelantang, spidol, penghapus].',
                'Kenyamanan ruang kegiatan [ventilasi udara/AC, pencahayaan].',
                'Kebersihan ruang kelas.',
                'Ketersediaan sarana ibadah.',
                'Ketersediaan akses internet'
            ],
            'Fasilitator' => [
                'Fasilitator memfasilitasi dan mendampingi proses pembelajaran peserta.',
                'Fasilitator menggunakan bahasa yang menghargai dan menghormati di dalam berkomunikasi dengan peserta.',
                'Fasilitator memulai dan mengakhiri pembelajaran tepat waktu.',
                'Fasilitator mampu menyampaikan materi dengan jelas dan tepat, sehingga peserta dapat memahami pembelajaran dengan baik.'
            ],
            'Akses LMS' => [
                'Kemudahan dalam mengakses LMS Pembelajaran',
                'Kemudahan dalam membaca materi/video yang ada di LMS',
                'Kemudahan dalam mengikuti alur LMS',
                'Kemudahan dalam pembelajaran di LMS',
                'Kemudahan dalam berdiskusi di LMS',
                'Kemudahan dalam mengumpulkan tugas di LMS'
            ],
            'Bahan Kegiatan' => [
                'Kelengkapan dokumen/kit bahan kegiatan [materi, LMS, ATK]',
                'Kualitas tampilan bahan tayang kegiatan.',
                'Keterbacaan materi dan bahan tayang kegiatan.',
                'Ketersediaan ilustrasi dan contoh pada bahan pembelajaran kegiatan.'
            ],
            'Jangka Waktu Pelaksanaan Kegiatan' => [
                'Kesesuaian alokasi waktu pelaksanaan kegiatan dengan tujuan dan sasaran program kegiatan.',
                'Ketepatan alokasi waktu untuk menyelesaikan setiap tagihan pembelajaran.'
            ],
            'Layanan Menu' => [
                'Kecukupan menu yang mendukung pemenuhan gizi.',
                'Variasi hidangan/konsumsi.',
                'Ketepatan waktu penyediaan konsumsi.'
            ]
        ];

        $totalIndikator = 0;
        foreach ($reactionQs as $qs) { $totalIndikator += count($qs); }

        // =========================================================
        // PERBAIKAN: Ambil data lama dari kolom JSON yang benar
        // =========================================================
        if (old('reaction_skor')) {
            $jawabanSkor = old('reaction_skor');
        } else {
            $kolomArray = [
                $reaction->evaluasi_program,
                $reaction->sarana_prasarana,
                $reaction->fasilitator,
                $reaction->akses_lms,
                $reaction->bahan_kegiatan,
                $reaction->jangka_waktu,
                $reaction->layanan_menu,
            ];
            $jawabanSkor = [];
            foreach ($kolomArray as $kolom) {
                if (is_array($kolom)) {
                    foreach ($kolom as $skor) {
                        $jawabanSkor[] = $skor;
                    }
                }
            }
        }
        // =========================================================
    @endphp

    <style>
        /* ===================== TOKEN WARNA (Sama dengan PKGSD MBI) ===================== */
        :root {
            --p-50: #eff4ff; --p-100: #dbe7fe; --p-200: #bfd4fb;
            --p-500: #3b82f6; --p-600: #2563eb; --p-700: #1d4ed8;
            --accent: #f5b82e; --ink: #0f1b3d; --muted: #64748b; --line: #e6ebf5;
        }

        .d-wrap { display: flex; flex-direction: column; gap: 22px; }
        .d-form { display: flex; flex-direction: column; gap: 22px; }
        .d-card { background: #fff; border: 1px solid var(--line); border-radius: 18px; overflow: hidden; }
        .d-card-h { font-size: 16px; font-weight: 700; color: var(--ink); letter-spacing: -.01em; }
        .d-card-s { margin-top: 2px; font-size: 12.5px; color: var(--muted); }
        .d-card-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; padding: 20px 20px 14px; }

        /* --- judul halaman --- */
        .d-title-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; }
        @media (max-width: 640px) { .d-title-row { flex-direction: column; } }
        .d-h1 { font-size: 28px; font-weight: 400; letter-spacing: -.02em; color: var(--ink); line-height: 1.2; }
        .d-h1 b { font-weight: 700; }
        .d-crumb { margin-top: 4px; font-size: 12.5px; color: var(--muted); }
        .d-crumb a { color: inherit; transition: color .2s; text-decoration: none; }
        .d-crumb a:hover { color: var(--p-600); }
        .d-desc { margin-top: 10px; max-width: 640px; font-size: 13px; line-height: 1.7; color: #475569; }

        /* --- tombol pastel --- */
        .d-pbtn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            flex-shrink: 0; height: 46px; padding: 0 18px; border-radius: 14px;
            background: var(--b-bg); border: 1px solid var(--b-line); color: var(--b-ink);
            font-family: inherit; font-size: 13.5px; font-weight: 700; cursor: pointer;
            white-space: nowrap; text-decoration: none; transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
        }
        .d-pbtn:hover { transform: translateY(-1px); filter: brightness(.97); box-shadow: 0 12px 22px -14px var(--b-glow); }
        .d-pbtn svg { flex-shrink: 0; transition: transform .3s ease; }
        .d-pbtn.back:hover svg { transform: translateX(-3px); }

        .b-blue { --b-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%); --b-line: #c6d8fb; --b-ink: #1d4ed8; --b-glow: rgba(37, 99, 235, .7); }
        .b-mint { --b-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%); --b-line: #bfe8d4; --b-ink: #047857; --b-glow: rgba(5, 150, 105, .7); }
        .b-slate { --b-bg: linear-gradient(160deg, #f6f8fc 0%, #e6ebf5 100%); --b-line: #d9e0ee; --b-ink: #475569; --b-glow: rgba(71, 85, 105, .6); }

        .d-foot { display: flex; justify-content: flex-end; gap: 12px; flex-wrap: wrap; }

        /* --- info instrumen + progres --- */
        .d-info-card { display: grid; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 1024px) { .d-info-card { grid-template-columns: minmax(0, 1fr) 280px; } }

        .d-info-main { padding: 22px; border-left: 4px solid var(--p-600); }
        .d-info-head { display: flex; align-items: flex-start; gap: 14px; }

        .d-info-ico {
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0; width: 44px; height: 44px;
            border-radius: 14px; background: var(--p-50); color: var(--p-600);
        }

        .d-note {
            display: flex; align-items: flex-start; gap: 10px; margin-top: 18px;
            padding: 12px 14px; border: 1px dashed var(--p-200); border-radius: 14px;
            background: #f5f8ff; font-size: 12.5px; line-height: 1.7; color: #475569;
        }
        .d-note b.t { display: block; font-weight: 700; color: var(--p-700); }
        .d-note ul { margin: 6px 0 0 16px; list-style: disc; }
        .d-note li + li { margin-top: 3px; }

        .d-prog { padding: 22px; border-top: 1px solid var(--line); background: #f9fbff; }
        @media (min-width: 1024px) { .d-prog { border-top: 0; border-left: 1px solid var(--line); } }

        .d-prog-row { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
        .d-prog-label { font-size: 12px; font-weight: 600; color: var(--muted); }
        .d-prog-pct { font-size: 12px; font-weight: 800; color: var(--p-600); }

        .d-bar { height: 8px; margin-top: 10px; overflow: hidden; border-radius: 9999px; background: #e6ebf5; }
        .d-bar > div { height: 100%; border-radius: 9999px; background: var(--p-600); transition: width .3s ease; }

        .d-prog-val { font-size: 14px; font-weight: 800; color: var(--ink); }
        .d-prog-sep { margin-top: 18px; padding-top: 16px; border-top: 1px solid var(--line); }

        /* --- notifikasi error --- */
        .d-error { padding: 16px 20px; border-radius: 16px; background: #fff1f2; border: 1px solid #fecdd3; color: #be123c; }
        .d-error b { font-size: 13px; font-weight: 700; }
        .d-error ul { margin: 8px 0 0 18px; list-style: disc; font-size: 12.5px; line-height: 1.8; }

        /* --- form --- */
        .d-form-grid { display: grid; gap: 18px; padding: 6px 20px 22px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) {
            .d-form-grid.c2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .d-form-grid .span2 { grid-column: 1 / -1; }
        }

        .d-label { display: block; margin-bottom: 8px; font-size: 12.5px; font-weight: 600; color: var(--ink); }
        .d-label i { color: #e11d48; font-style: normal; }

        .d-field {
            width: 100%; height: 44px; padding: 0 14px;
            border: 1px solid var(--line); border-radius: 12px;
            background: #fff; color: #334155; font-family: inherit; font-size: 13px;
            outline: none; transition: border-color .2s, box-shadow .2s;
        }
        textarea.d-field { height: auto; padding: 11px 14px; line-height: 1.6; resize: vertical; }
        .d-field::placeholder { color: #94a3b8; }
        .d-field:focus { border-color: var(--p-500); box-shadow: 0 0 0 4px var(--p-100); }
        .d-field:disabled { background: #f8fafc; color: #94a3b8; }

        .d-err { margin-top: 6px; font-size: 12px; color: #e11d48; }

        /* --- indikator kartu rubrik --- */
        .d-group-bar { padding: 11px 20px; font-size: 12.5px; font-weight: 700; color: var(--ink); border-top: 1px solid var(--line); background: #f9fbff; }
        .d-item { padding: 20px; border-top: 1px solid var(--line); }
        .d-group-bar + .d-item { border-top: 0; }
        .d-item:first-child { border-top: 0; }

        .d-item-no { font-size: 11px; font-weight: 800; letter-spacing: .06em; text-transform: uppercase; color: #94a3b8; }
        .d-item-q { margin-top: 4px; font-size: 13.5px; font-weight: 600; line-height: 1.7; color: #334155; }

        .d-opts { display: grid; gap: 10px; margin-top: 14px; grid-template-columns: minmax(0, 1fr); }
        @media (min-width: 768px) {
            .d-opts { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .d-opts .span2 { grid-column: 1 / -1; }
        }

        /* --- OPSI RADIO (SEJAJAR) --- */
        .d-opt {
            display: flex; align-items: center; gap: 12px;
            padding: 12px 14px; border: 1px solid var(--line);
            border-radius: 14px; background: #fff; cursor: pointer;
            transition: border-color .2s, background .2s;
        }
        .d-opt:hover { border-color: var(--p-200); background: #f7f9ff; }
        .d-opt:has(input:checked) { border-color: var(--p-500); background: var(--p-50); box-shadow: 0 0 0 3px var(--p-100); }
        
        .d-opt input { margin: 0; width: 18px; height: 18px; accent-color: var(--p-600); cursor: pointer; }
        .d-opt-skor {
            display: inline-flex; align-items: center; justify-content: center;
            width: 24px; height: 24px; flex-shrink: 0; border-radius: 8px;
            background: var(--p-50); color: var(--p-700); font-size: 11.5px; font-weight: 800;
        }
        .d-opt:has(input:checked) .d-opt-skor { background: var(--p-600); color: #fff; }
        .d-opt-txt { font-size: 12.5px; line-height: 1.5; color: #475569; margin: 0; }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Edit Instrumen <b>Reaction</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.index') }}">Instrumen</a> &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.stem.index') }}">STEM</a> &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.stem.diseminasi') }}">Diseminasi</a> &nbsp;›&nbsp; Edit Reaction
                    </p>
                </div>
                <a href="{{ route('instrumen.stem.diseminasi.reaction.show', $reaction->id) }}" class="d-pbtn b-blue back">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                    Kembali
                </a>
            </div>
        </section>

        {{-- ================= INFORMASI INSTRUMEN & PROGRES ================= --}}
        <div class="d-card">
            <div class="d-info-card">
                <div class="d-info-main">
                    <div class="d-info-head">
                        <div class="d-info-ico">
                            <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div style="min-width:0">
                            <h2 class="d-card-h">Petunjuk Pengisian</h2>
                            <p class="d-card-s" style="line-height:1.7">
                                Instrumen diisi oleh peserta diseminasi berdasarkan pengalaman selama mengikuti kegiatan.
                            </p>
                        </div>
                    </div>

                    <div class="d-note">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px;color:var(--p-600)">
                            <path d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        <div>
                            <b class="t">Skala Penilaian 1-4</b>
                            <ul>
                                <li><b>1 = Kurang</b></li>
                                <li><b>2 = Cukup</b></li>
                                <li><b>3 = Baik</b></li>
                                <li><b>4 = Sangat Baik</b></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="d-prog">
                    <div class="d-prog-row">
                        <span class="d-prog-label">Progres penilaian skor</span>
                        <span id="reaction-progress-percent" class="d-prog-pct">0%</span>
                    </div>
                    <div class="d-bar">
                        <div id="reaction-progress-bar" style="width: 0%"></div>
                    </div>
                    <div class="d-prog-row" style="margin-top:10px">
                        <span id="reaction-progress-text" class="d-prog-val">0 / {{ $totalIndikator }} butir</span>
                        <span class="d-prog-label" style="font-weight:500">Indikator</span>
                    </div>
                    <div class="d-prog-sep">
                        <p class="d-prog-label">Skor sementara</p>
                        <p id="reaction-score-text" class="d-prog-val" style="margin-top:4px">Belum ada penilaian</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= VALIDATION ERROR ================= --}}
        @if ($errors->any())
            <div class="d-error">
                <b>Terdapat kesalahan pada pengisian:</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ================= FORM UTAMA ================= --}}
        <form action="{{ route('instrumen.stem.diseminasi.reaction.update', $reaction->id) }}" method="POST" class="d-form" id="reaction-form">
            @csrf
            @method('PUT')

            {{-- IDENTITAS --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">A. Identitas Responden</h2>
                        <p class="d-card-s">Informasi mengenai peserta diseminasi.</p>
                    </div>
                </div>
                <div class="d-form-grid c2">
                    <div>
                        <label class="d-label">Nama Responden <i>*</i></label>
                        <input type="text" name="nama_responden" value="{{ old('nama_responden', $reaction->nama_responden) }}" required class="d-field" placeholder="Nama lengkap">
                        @error('nama_responden') <p class="d-err">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="d-label">Asal Satuan Pendidikan <i>*</i></label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $reaction->asal_sekolah) }}" required class="d-field" placeholder="Nama sekolah">
                        @error('asal_sekolah') <p class="d-err">{{ $message }}</p> @enderror
                    </div>
                    <div class="span2">
                        <label class="d-label">Nama Petugas Monev <i>*</i></label>
                        <input type="text" name="nama_petugas_monev" value="{{ old('nama_petugas_monev', $reaction->nama_petugas_monev) }}" required class="d-field" placeholder="Nama petugas">
                        @error('nama_petugas_monev') <p class="d-err">{{ $message }}</p> @enderror
                    </div>
                </div>
            </section>

            {{-- FORM REACTION --}}
            <section class="d-card">
                <div class="d-card-top">
                    <div>
                        <h2 class="d-card-h">B. Penilaian Reaction</h2>
                        <p class="d-card-s">Skala: 1 = Kurang, 2 = Cukup, 3 = Baik, 4 = Sangat Baik.</p>
                    </div>
                </div>

                <div>
                    @php $idx = 0; @endphp
                    @foreach($reactionQs as $section => $questions)
                        <div class="d-group-bar">{{ $section }}</div>
                        @foreach($questions as $q)
                            <div class="d-item" data-react-item>
                                <div>
                                    <p class="d-item-no">Indikator {{ $idx + 1 }}</p>
                                    <p class="d-item-q">{{ $q }}</p>
                                </div>
                                <div class="d-opts">
                                    @for($i=1; $i<=4; $i++)
                                        <label class="d-opt">
                                            <input type="radio" name="reaction_skor[{{ $idx }}]" value="{{ $i }}" @checked(old("reaction_skor.$idx", $jawabanSkor[$idx] ?? null) == $i) required class="d-radio" data-react-radio>
                                            <span class="d-opt-skor">{{ $i }}</span>
                                            <span class="d-opt-txt">
                                                @if($i == 1) Kurang
                                                @elseif($i == 2) Cukup
                                                @elseif($i == 3) Baik
                                                @else Sangat Baik @endif
                                            </span>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                            @php $idx++; @endphp
                        @endforeach
                    @endforeach
                </div>
            </section>

            {{-- TOMBOL AKSI --}}
            <div class="d-foot">
                <button type="submit" class="d-pbtn b-mint">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
            const form = document.getElementById('reaction-form');
            const totalIndikator = {{ $totalIndikator }};

            function updateProgress() {
                const checkedRadios = form.querySelectorAll('input[data-react-radio]:checked');
                const checkedCount = checkedRadios.length;

                let totalScore = 0;
                checkedRadios.forEach(el => {
                    totalScore += Number(el.value);
                });

                const percent = totalIndikator ? Math.round(checkedCount / totalIndikator * 100) : 0;

                document.getElementById('reaction-progress-percent').textContent = percent + '%';
                document.getElementById('reaction-progress-bar').style.width = percent + '%';
                document.getElementById('reaction-progress-text').textContent = checkedCount + ' / ' + totalIndikator + ' butir';
                
                document.getElementById('reaction-score-text').textContent = checkedCount
                    ? totalScore + ' poin dari ' + checkedCount + ' indikator'
                    : 'Belum ada penilaian';
            }

            form.querySelectorAll('input[data-react-radio]').forEach(el => {
                el.addEventListener('change', updateProgress);
            });

            // Inisialisasi awal
            updateProgress();
        });
    </script>

@endsection