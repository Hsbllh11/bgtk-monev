@extends('layouts.app')

@section('title', 'Hasil Penilaian TENDIK')
@section('page-title', 'Hasil Penilaian TENDIK')

@section('content')
    @php
        /*
        |--------------------------------------------------------------------------
        | DATA PERTANYAAN ASLI INSTRUMEN TENDIK
        |--------------------------------------------------------------------------
        */
        $pertanyaan = [
            1 => 'Materi pelatihan sesuai dengan tugas dan kebutuhan saya sebagai tenaga kependidikan.',
            2 => 'Cakupan materi lengkap dan disusun secara runtut sehingga mudah diikuti.',
            3 => 'Materi yang disampaikan sesuai dengan ketentuan dan perkembangan terbaru.',
            4 => 'Materi dilengkapi contoh kasus dan praktik sehingga dapat saya terapkan langsung di sekolah.',
            5 => 'Bahan pendukung (modul, tayangan, contoh dokumen) lengkap, jelas, dan bermanfaat.',
            6 => 'Narasumber/fasilitator menguasai materi dan menjawab pertanyaan dengan tepat.',
            7 => 'Narasumber/fasilitator menyampaikan materi dengan jelas, sistematis, dan mudah dipahami.',
            8 => 'Metode dan media pembelajaran (contoh kasus, praktik, tayangan) membuat saya tertarik dan terlibat aktif.',
            9 => 'Narasumber/fasilitator terbuka terhadap pertanyaan, mendorong diskusi, dan memberikan umpan balik.',
            10 => 'Narasumber/fasilitator bersikap ramah dan santun serta mengelola waktu dengan baik.',
            11 => 'Informasi kegiatan (undangan, jadwal, dan bahan) disampaikan dengan jelas dan tepat waktu.',
            12 => 'Alokasi waktu dan jadwal pelatihan memadai dan dijalankan sesuai rencana.',
            13 => 'Tempat, sarana prasarana, dan konsumsi mendukung kelancaran kegiatan.',
            14 => 'Panitia melayani peserta dengan ramah, cepat tanggap, dan membantu.',
            15 => 'Secara keseluruhan, saya puas dengan penyelenggaraan pelatihan ini.',

            16 => 'Saya memahami jenis data sekolah yang harus dikelola serta alur pengelolaannya (pengumpulan, verifikasi, dan pemutakhiran).',
            17 => 'Saya mampu mempraktikkan pengelolaan data sekolah (input, verifikasi, dan pemutakhiran) sesuai ketentuan.',
            18 => 'Saya menjadi lebih teliti dan bertanggung jawab dalam menjaga keakuratan data sekolah.',
            19 => 'Saya memahami prosedur layanan administrasi sekolah (persuratan, pengarsipan, dan pelayanan warga sekolah) yang benar.',
            20 => 'Saya mampu menyusun dokumen persuratan, mengelola arsip, dan melayani warga sekolah sesuai prosedur.',
            21 => 'Saya menjadi lebih ramah, tertib, dan responsif dalam melayani kebutuhan warga sekolah.',
            22 => 'Saya memahami ketentuan administrasi keuangan dan pelaporan yang berlaku di sekolah.',
            23 => 'Saya mampu menyusun pembukuan, bukti transaksi, dan laporan keuangan sesuai format yang ditetapkan.',
            24 => 'Saya menjadi lebih jujur, transparan, dan akuntabel dalam mengelola administrasi keuangan.',
            25 => 'Saya memahami peran dan manfaat kolaborasi serta jejaring dengan kepala sekolah, guru, rekan sejawat, dinas, dan mitra.',
            26 => 'Saya mampu berkomunikasi, berkoordinasi, dan membangun jejaring kerja dengan berbagai pihak.',
            27 => 'Saya menjadi lebih terbuka, menghargai pendapat orang lain, dan mau bekerja sama.',
            28 => 'Saya memahami bahwa kemampuan dapat berkembang melalui usaha dan belajar, serta perbedaan growth mindset dengan fixed mindset.',
            29 => 'Saya mampu merumuskan tujuan pengembangan diri dan strategi menghadapi tantangan serta umpan balik dalam pekerjaan.',
            30 => 'Saya memandang tantangan dan kesalahan sebagai peluang belajar dan bersemangat mengembangkan diri.',
            31 => 'Saya memahami peran, etika, dan standar kinerja yang dituntut dari tenaga kependidikan yang profesional.',
            32 => 'Saya mampu mengatur waktu dan prioritas kerja serta memanfaatkan teknologi secara profesional.',
            33 => 'Saya berkomitmen menjaga integritas, disiplin, tanggung jawab, dan kerahasiaan data dalam bekerja.',

            34 => 'Saya menerapkan hasil pelatihan dalam pengelolaan data sekolah, yaitu memperbarui dan memverifikasi data secara berkala.',
            35 => 'Saya melayani kebutuhan administrasi warga sekolah dengan lebih cepat, tertib, dan ramah.',
            36 => 'Saya menyusun dokumen administrasi dan laporan (termasuk laporan keuangan) tepat waktu dan sesuai format.',
            37 => 'Saya berkolaborasi aktif dengan kepala sekolah, guru, rekan tenaga kependidikan, dan pihak luar (dinas, mitra jejaring) dalam menjalankan tugas.',
            38 => 'Saya memanfaatkan teknologi dalam bekerja dan menjaga keamanan serta kerahasiaan data sekolah.',

            39 => 'Data sekolah menjadi lebih akurat, lengkap, dan mutakhir dibandingkan sebelum pelatihan.',
            40 => 'Waktu penyelesaian layanan administrasi menjadi lebih singkat dan keluhan layanan berkurang.',
            41 => 'Kesalahan dan temuan pada laporan administrasi maupun keuangan berkurang.',
            42 => 'Kerja sama tim dan koordinasi antarwarga sekolah menjadi lebih baik.',
            43 => 'Pelatihan memberi dampak positif pada mutu layanan dan kinerja sekolah secara keseluruhan.',
        ];

        /*
        |--------------------------------------------------------------------------
        | LEVEL DAN RENTANG BUTIR
        |--------------------------------------------------------------------------
        */
        $levels = [
            1 => [
                'label' => 'Level I - Reaksi',
                'nama' => 'Reaksi (Reaction)',
                'deskripsi' => 'Kepuasan peserta terhadap pelaksanaan pelatihan.',
                'rentang' => range(1, 15),
                'badge' => 'background:#dbeafe;color:#1d4ed8',
                'bar' => '#2563eb',
            ],
            2 => [
                'label' => 'Level II - Belajar',
                'nama' => 'Belajar (Learning)',
                'deskripsi' => 'Pengetahuan, keterampilan, dan sikap setelah pelatihan.',
                'rentang' => range(16, 33),
                'badge' => 'background:#ede9fe;color:#6d28d9',
                'bar' => '#7c3aed',
            ],
            3 => [
                'label' => 'Level III - Perilaku',
                'nama' => 'Perilaku (Behavior)',
                'deskripsi' => 'Penerapan hasil pelatihan di tempat kerja.',
                'rentang' => range(34, 38),
                'badge' => 'background:#d1fae5;color:#047857',
                'bar' => '#059669',
            ],
            4 => [
                'label' => 'Level IV - Hasil',
                'nama' => 'Hasil (Results)',
                'deskripsi' => 'Dampak penerapan hasil pelatihan bagi sekolah.',
                'rentang' => range(39, 43),
                'badge' => 'background:#fef3c7;color:#b45309',
                'bar' => '#d99a0b',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | PERHITUNGAN SKOR
        |--------------------------------------------------------------------------
        */
        $jabatanResponden = $tendik->jabatan_responden
            ?? $tendik->jabatan
            ?? '';

        $isTendik = in_array(
            $jabatanResponden,
            ['Tendik', 'Operator', 'Bendahara'],
            true
        );

        // Tendik menggunakan Level 1-4.
        // Jabatan lainnya hanya menggunakan Level 3-4.
        if (!$isTendik) {
            $levels = array_filter(
                $levels,
                fn($level, $nomorLevel) => in_array($nomorLevel, [3, 4], true),
                ARRAY_FILTER_USE_BOTH
            );
        }

        $jumlahButir = array_sum(
            array_map(
                fn($level) => count($level['rentang']),
                $levels
            )
        );

        $skorMaksimal = $jumlahButir * 4;
        $totalSkor = 0;
        $jumlahTerisi = 0;

        $levelScores = [];
        $levelCounts = [];
        $levelMaxScores = [];
        $levelPersentase = [];

        foreach ($levels as $nomorLevel => $level) {
            $skorLevel = 0;
            $terisiLevel = 0;

            foreach ($level['rentang'] as $nomor) {
                $nilai = $tendik->{'jawaban_' . $nomor};

                if ($nilai !== null && $nilai !== '') {
                    $skorLevel += (int) $nilai;
                    $terisiLevel++;
                }
            }

            $levelScores[$nomorLevel] = $skorLevel;
            $levelCounts[$nomorLevel] = $terisiLevel;
            $levelMaxScores[$nomorLevel] = count($level['rentang']) * 4;

            $levelPersentase[$nomorLevel] = $levelMaxScores[$nomorLevel] > 0
                ? ($skorLevel / $levelMaxScores[$nomorLevel]) * 100
                : 0;

            $totalSkor += $skorLevel;
            $jumlahTerisi += $terisiLevel;
        }

        $persentaseTotal = $skorMaksimal > 0
            ? ($totalSkor / $skorMaksimal) * 100
            : 0;

        $rataRata = $jumlahTerisi > 0
            ? $totalSkor / $jumlahTerisi
            : 0;

        $predikat = match (true) {
            $jumlahTerisi === 0 => 'Belum Dinilai',
            $rataRata >= 3.26 => 'Sangat Baik',
            $rataRata >= 2.51 => 'Baik',
            $rataRata >= 1.76 => 'Cukup',
            default => 'Kurang',
        };

        $predikatStyle = match ($predikat) {
            'Sangat Baik' => 'background:#d1fae5;color:#047857',
            'Baik' => 'background:#dbeafe;color:#1d4ed8',
            'Cukup' => 'background:#fef3c7;color:#b45309',
            'Kurang' => 'background:#ffe4e6;color:#be123c',
            default => 'background:#f1f5f9;color:#475569',
        };

        $tanggalPengisian = $tendik->tanggal_pengisian
            ?? $tendik->tanggal_evaluasi
            ?? $tendik->created_at;

        $namaPetugas = $tendik->nama_petugas_monev
            ?? $tendik->nama_petugas
            ?? '-';

        $instansiPetugas = $tendik->instansi_petugas
            ?? $tendik->unit_kerja_petugas
            ?? $tendik->instansi
            ?? '-';

        $namaResponden = $tendik->nama_responden
            ?? $tendik->nama
            ?? '-';

        $satuanPendidikan = $tendik->satuan_pendidikan
            ?? $tendik->nama_sekolah
            ?? '-';

        $masaKerja = $tendik->masa_kerja ?? null;

        $namaKegiatan = $tendik->nama_pelatihan
            ?? $tendik->nama_kegiatan
            ?? $tendik->nama_kegiatan_pelatihan
            ?? $tendik->kegiatan
            ?? '-';

        $statusSelesai = $jumlahTerisi === $jumlahButir;

        $statusPengisianLabel = $statusSelesai
            ? 'Selesai'
            : 'Belum Lengkap';

        $statusStyle = $statusSelesai
            ? 'background:#d1fae5;color:#047857'
            : 'background:#fef3c7;color:#b45309';
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan Data Sekolah) ===================== */
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

        .d-pill {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border-radius: 9px;
            background: var(--p-50);
            color: var(--p-700);
            font-size: 11.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        /* --- judul halaman --- */
        .d-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }

        @media (max-width: 1023px) {
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
        .d-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

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

        .b-violet {
            --b-bg: linear-gradient(160deg, #f2edff 0%, #e0d6ff 100%);
            --b-line: #d6caf9;
            --b-ink: #6d28d9;
            --b-glow: rgba(124, 58, 237, .7);
        }

        .b-amber {
            --b-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%);
            --b-line: #f6dd9b;
            --b-ink: #b45309;
            --b-glow: rgba(217, 154, 11, .7);
        }

        /* --- tile ringkasan --- */
        .d-tiles {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        @media (max-width: 767px) {
            .d-tiles {
                grid-template-columns: 1fr;
            }
        }

        .d-tile {
            position: relative;
            text-align: center;
            padding: 22px 16px 18px;
            overflow: hidden;
            background: var(--t-bg, var(--p-50));
            border: 1px solid var(--t-line, #dfe8fb);
            border-radius: 18px;
            transition: transform .3s cubic-bezier(.22, 1, .36, 1), box-shadow .3s cubic-bezier(.22, 1, .36, 1);
        }

        .d-tile:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 30px -20px var(--t-glow, rgba(37, 99, 235, .6));
        }

        .d-tile-clip {
            position: absolute;
            left: 12px;
            top: 12px;
            color: var(--t-clip, #a9bde6);
        }

        .d-tile-dot {
            position: absolute;
            right: 14px;
            top: 14px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: var(--p-600);
            z-index: 1;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .65);
        }

        .d-tile-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            margin: 0 auto 10px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 18px -10px var(--t-glow, rgba(37, 99, 235, .55));
        }

        .d-tile-label {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
        }

        .d-tile-val {
            margin-top: 4px;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .d-tile-val small {
            font-size: 15px;
            font-weight: 600;
            color: #7f8cab;
        }

        .d-tile-note {
            margin-top: 6px;
            font-size: 11.5px;
            color: #55637f;
        }

        .t-blue {
            --t-bg: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            --t-line: #c6d8fb;
            --t-glow: rgba(37, 99, 235, .55);
            --t-clip: #8fa9e6;
        }

        .t-mint {
            --t-bg: linear-gradient(160deg, #e9faf2 0%, #cdf0e0 100%);
            --t-line: #bfe8d4;
            --t-glow: rgba(5, 150, 105, .5);
            --t-clip: #86c9ae;
        }

        .t-amber {
            --t-bg: linear-gradient(160deg, #fff7de 0%, #fde8ac 100%);
            --t-line: #f6dd9b;
            --t-glow: rgba(217, 154, 11, .5);
            --t-clip: #d3b568;
        }

        .d-tile::before,
        .d-tile::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 9999px;
            pointer-events: none;
        }

        .d-tile::before {
            right: -30px;
            bottom: -42px;
            width: 124px;
            height: 124px;
            background: rgba(255, 255, 255, .38);
        }

        .d-tile::after {
            left: -26px;
            bottom: -46px;
            width: 92px;
            height: 92px;
            background: rgba(255, 255, 255, .24);
        }

        .d-tile>p,
        .d-tile>div,
        .d-tile>.d-tile-ico {
            position: relative;
            z-index: 1;
        }

        /* --- notifikasi sukses --- */
        .d-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 16px;
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
            font-size: 13px;
            font-weight: 600;
            line-height: 1.7;
        }

        /* --- grid info identitas --- */
        .d-info {
            display: grid;
            gap: 18px 32px;
            padding: 6px 20px 22px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-info.c2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .d-info-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
        }

        .d-info-val {
            margin-top: 4px;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
            line-height: 1.5;
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

        .d-badge.lg {
            padding: 7px 16px;
            border-radius: 10px;
            font-size: 14px;
        }

        /* --- rekap level --- */
        .d-levels {
            display: grid;
            gap: 16px;
            padding: 6px 20px 22px;
            grid-template-columns: minmax(0, 1fr);
        }

        @media (min-width: 768px) {
            .d-levels {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .d-levels.four {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        .d-level {
            display: flex;
            flex-direction: column;
            padding: 16px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #f9fbff;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .d-level:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 24px -18px rgba(37, 99, 235, .5);
        }

        .d-level-desc {
            flex: 1;
            margin-top: 8px;
            min-height: 38px;
            font-size: 12px;
            line-height: 1.6;
            color: var(--muted);
        }

        .d-level-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 10px;
            margin-top: 14px;
        }

        .d-level-score {
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        .d-level-score small {
            font-size: 12px;
            font-weight: 600;
            color: #7f8cab;
        }

        .d-level-pct {
            font-size: 13px;
            font-weight: 700;
            color: #475569;
        }

        .d-bar {
            height: 8px;
            margin-top: 10px;
            overflow: hidden;
            border-radius: 9999px;
            background: #e6ebf5;
        }

        .d-bar>span {
            display: block;
            height: 100%;
            border-radius: 9999px;
        }

        .d-level-foot {
            margin-top: 10px;
            font-size: 11.5px;
            color: var(--muted);
        }

        /* --- tabel --- */
        .d-table {
            width: 100%;
            min-width: 800px;
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

        .d-table tbody tr {
            transition: background .2s;
        }

        .d-table tbody tr:hover {
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
        }

        .d-table .q {
            font-size: 13px;
            line-height: 1.7;
            color: #334155;
        }

        .d-table .faint {
            font-size: 12px;
            color: #94a3b8;
        }

        .d-score {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            border-radius: 11px;
            background: var(--p-600);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
        }

        /* --- cetak --- */
        @media print {

            body {
                background: white !important;
            }

            aside,
            nav,
            header,
            .no-print {
                display: none !important;
            }

            .d-wrap {
                gap: 16px !important;
            }

            .d-card,
            .d-tile {
                break-inside: avoid;
                box-shadow: none !important;
            }

            .d-tile:hover,
            .d-level:hover {
                transform: none !important;
                box-shadow: none !important;
            }

            .d-table {
                min-width: 0 !important;
                font-size: 10px !important;
            }

            .d-table th,
            .d-table td {
                padding: 6px !important;
            }

            @page {
                size: A4;
                margin: 12mm;
            }
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Hasil Penilaian <b>TENDIK</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="{{ route('instrumen.index') }}">Instrumen</a>
                        &nbsp;›&nbsp; Hasil Penilaian TENDIK
                    </p>
                    <p class="d-desc">Detail lengkap hasil pengisian instrumen monitoring dan evaluasi TENDIK.</p>
                </div>

                <div class="no-print d-actions">

                    {{-- Kembali --}}
                    <a href="{{ route('instrumen.index') }}" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Kembali
                    </a>

                    {{-- Cetak Hasil --}}
                    <a href="{{ route('tendik.cetak', $tendik) }}" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" />
                            <path d="M6 14h12v7H6z" />
                        </svg>
                        Cetak Hasil
                    </a>

                    {{-- Gabung PDF --}}
                    <a href="{{ route('cetak-gabungan.index', ['pilih' => ['tendik-' . $tendik->id]]) }}"
                        class="d-pbtn b-violet">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 3h7l5 5v9a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2z" />
                            <path d="M16 3v5h5" />
                            <path d="M17 21H6a2 2 0 01-2-2V9" />
                        </svg>
                        Gabung PDF
                    </a>

                    {{-- Edit Data --}}
                    <a href="{{ route('tendik.edit', $tendik) }}" class="d-pbtn b-amber">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </a>

                </div>
            </div>
        </section>

        {{-- ================= NOTIFIKASI ================= --}}
        @if (session('success'))
            <div class="d-alert">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px">
                    <path d="M5 13l4 4L19 7" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- ================= RINGKASAN HASIL ================= --}}
        <div class="d-tiles">

            {{-- Total Skor --}}
            <div class="d-tile t-blue">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot"></span>
                <span class="d-tile-ico" style="color:var(--p-600)">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 11l3 3L22 4" />
                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                    </svg>
                </span>
                <p class="d-tile-label">Total Skor</p>
                <p class="d-tile-val">{{ $totalSkor }}<small> / {{ $skorMaksimal }}</small></p>
                <p class="d-tile-note">Akumulasi skor dari {{ $jumlahButir }} indikator</p>
            </div>

            {{-- Nilai Akhir --}}
            <div class="d-tile t-mint">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:#10b981"></span>
                <span class="d-tile-ico" style="color:#059669">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 5L5 19" />
                        <circle cx="6.5" cy="6.5" r="2.5" />
                        <circle cx="17.5" cy="17.5" r="2.5" />
                    </svg>
                </span>
                <p class="d-tile-label">Nilai Akhir</p>
                <p class="d-tile-val">{{ number_format($persentaseTotal, 2, ',', '.') }}<small> %</small></p>
                <p class="d-tile-note">Persentase capaian berdasarkan skor maksimum</p>
            </div>

            {{-- Predikat --}}
            <div class="d-tile t-amber">
                <svg class="d-tile-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <span class="d-tile-dot" style="background:var(--accent)"></span>
                <span class="d-tile-ico" style="color:#d99a0b">
                    <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg>
                </span>
                <p class="d-tile-label">Predikat</p>
                <div style="margin-top:8px">
                    <span class="d-badge lg" style="{{ $predikatStyle }}">{{ $predikat }}</span>
                </div>
                <p class="d-tile-note">Kategori hasil penilaian TENDIK</p>
            </div>

        </div>

        {{-- ================= A. IDENTITAS PETUGAS MONEV ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">A. Identitas Petugas Monev</h2>
                    <p class="d-card-s">Identitas petugas yang melakukan monitoring dan evaluasi.</p>
                </div>
            </div>

            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Petugas Monev</p>
                    <p class="d-info-val">{{ $namaPetugas }}</p>
                </div>

                <div>
                    <p class="d-info-label">Instansi Petugas</p>
                    <p class="d-info-val">{{ $instansiPetugas }}</p>
                </div>

                <div>
                    <p class="d-info-label">Lokasi Monev</p>
                    <p class="d-info-val">{{ $tendik->lokasi_monev ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Tanggal Pelaksanaan</p>
                    <p class="d-info-val">
                        {{ $tendik->tanggal_pengisian
        ? \Carbon\Carbon::parse($tendik->tanggal_pengisian)->format('d/m/Y')
        : '-' }}
                    </p>
                </div>
            </div>
        </section>

        {{-- ================= B. IDENTITAS RESPONDEN ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">B. Identitas Responden</h2>
                    <p class="d-card-s">Identitas responden yang mengisi instrumen.</p>
                </div>
            </div>

            <div class="d-info c2">
                <div>
                    <p class="d-info-label">Nama Responden</p>
                    <p class="d-info-val">{{ $namaResponden }}</p>
                </div>

                <div>
                    <p class="d-info-label">Jabatan</p>
                    <p class="d-info-val">{{ $jabatanResponden ?: '-' }}</p>
                </div>

                <div>
                    <p class="d-info-label">Satuan Pendidikan</p>
                    <p class="d-info-val">{{ $satuanPendidikan }}</p>
                </div>

                <div>
                    <p class="d-info-label">Masa Kerja (tahun)</p>
                    <p class="d-info-val">
                        {{ is_numeric($masaKerja) ? $masaKerja . ' tahun' : ($masaKerja ?: '-') }}
                    </p>
                </div>

                <div>
                    <p class="d-info-label">Nama Kegiatan/Pelatihan</p>
                    <p class="d-info-val">{{ $namaKegiatan }}</p>
                </div>

                <div>
                    <p class="d-info-label">Tanggal Pengisian</p>
                    <p class="d-info-val">
                        {{ $tanggalPengisian ? \Illuminate\Support\Carbon::parse($tanggalPengisian)->format('d/m/Y') : '-' }}
                    </p>
                </div>

                <div>
                    <p class="d-info-label">Status Pengisian</p>
                    <div style="margin-top:6px">
                        <span class="d-badge" style="{{ $statusStyle }}">
                            {{ $statusPengisianLabel }} ({{ $jumlahTerisi }}/{{ $jumlahButir }} butir)
                        </span>
                    </div>
                </div>
            </div>
        </section>

        {{-- ================= REKAP PER LEVEL ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Rekapitulasi Berdasarkan Level</h2>
                    <p class="d-card-s">Ringkasan skor pada masing-masing level evaluasi.</p>
                </div>

                <span class="d-pill">{{ count($levels) }} level</span>
            </div>

            <div class="d-levels {{ count($levels) === 4 ? 'four' : '' }}">
                @foreach ($levels as $nomorLevel => $level)
                    <div class="d-level">
                        <div>
                            <span class="d-badge" style="{{ $level['badge'] }}">{{ $level['label'] }}</span>
                        </div>

                        <p class="d-level-desc">{{ $level['deskripsi'] }}</p>

                        <div class="d-level-row">
                            <div class="d-level-score">
                                {{ $levelScores[$nomorLevel] }}<small> / {{ $levelMaxScores[$nomorLevel] }}</small>
                            </div>

                            <span class="d-level-pct">
                                {{ number_format($levelPersentase[$nomorLevel], 2, ',', '.') }}%
                            </span>
                        </div>

                        <div class="d-bar">
                            <span
                                style="width: {{ min($levelPersentase[$nomorLevel], 100) }}%;background: {{ $level['bar'] }}"></span>
                        </div>

                        <p class="d-level-foot">
                            {{ $levelCounts[$nomorLevel] }} dari {{ count($level['rentang']) }} butir terisi
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ================= DETAIL INDIKATOR ================= --}}
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Detail Penilaian {{ $jumlahButir }} Butir</h2>
                    <p class="d-card-s">
                        Pernyataan ditampilkan sesuai redaksi instrumen Monitoring dan Evaluasi TENDIK.
                    </p>
                </div>

                <span class="d-pill">{{ $jumlahTerisi }} dari {{ $jumlahButir }} terisi</span>
            </div>

            <div style="overflow-x:auto">
                <table class="d-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Level</th>
                            <th>Pernyataan</th>
                            <th class="center">Skor</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($levels as $nomorLevel => $level)
                            @foreach ($level['rentang'] as $nomor)
                                @php
                                    $jawabanButir = $tendik->{'jawaban_' . $nomor};
                                @endphp

                                <tr>
                                    <td class="txt">{{ $nomor }}</td>

                                    <td style="white-space:nowrap">
                                        <span class="d-badge" style="{{ $level['badge'] }}">{{ $level['label'] }}</span>
                                    </td>

                                    <td class="q">{{ $pertanyaan[$nomor] }}</td>

                                    <td style="text-align:center">
                                        @if ($jawabanButir !== null && $jawabanButir !== '')
                                            <span class="d-score">{{ $jawabanButir }}</span>
                                        @else
                                            <span class="faint">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

    </div>

@endsection