<?php $__env->startSection('title', 'Hasil Penilaian BCKS'); ?>

<?php $__env->startSection('page-title', 'Hasil Penilaian BCKS'); ?>

<?php $__env->startSection('content'); ?>
    <?php
        /*
        |--------------------------------------------------------------------------
        | Konfigurasi instrumen
        |--------------------------------------------------------------------------
        */

        $levelsConfig = config('bcks.instrumen.levels', []);

        $levelConfig = [
            'Reaction' => [
                'label' => 'Level 1 - Reaction',
                'deskripsi' => 'Reaksi peserta terhadap pelaksanaan pelatihan.',
                'badge' => 'background:#dbeafe;color:#1d4ed8',
                'bar' => '#2563eb',
            ],
            'Learning' => [
                'label' => 'Level 2 - Learning',
                'deskripsi' => 'Perubahan pemahaman dan kesiapan peserta setelah pelatihan.',
                'badge' => 'background:#ede9fe;color:#6d28d9',
                'bar' => '#7c3aed',
            ],
            'Behavior' => [
                'label' => 'Level 3 - Behavior',
                'deskripsi' => 'Perubahan perilaku dan penerapan hasil pelatihan di sekolah.',
                'badge' => 'background:#d1fae5;color:#047857',
                'bar' => '#059669',
            ],
            'Results' => [
                'label' => 'Level 4 - Results',
                'deskripsi' => 'Dampak penerapan hasil pelatihan terhadap sekolah.',
                'badge' => 'background:#fef3c7;color:#b45309',
                'bar' => '#d99a0b',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Filter indikator berdasarkan status responden
        |--------------------------------------------------------------------------
        */

        $statusResponden = $bcksPengisian->status_responden ?? '';
        $isBcks = $statusResponden === 'BCKS';

        $levelAktif = $isBcks
            ? ['Reaction', 'Learning', 'Behavior', 'Results']
            : ['Behavior', 'Results'];

        /*
        |--------------------------------------------------------------------------
        | Ambil jawaban yang berlaku (Deteksi Data Lama vs Baru)
        |--------------------------------------------------------------------------
        */

        $jawabanSemua = $bcksPengisian->jawaban ?? collect();
        // Jika data lama, nomor indikator maksimalnya 27. Jika baru, maksimalnya 40.
        $isDataLama = $jawabanSemua->isNotEmpty() && $jawabanSemua->max('nomor_indikator') <= 27;

        $jawaban = $jawabanSemua
            ->filter(function ($item) use ($levelAktif) {
                return in_array($item->level, $levelAktif, true);
            })
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Bangun daftar indikator yang ditampilkan
        |--------------------------------------------------------------------------
        */

        $indikatorConfig = [];
        $nomorUrut = 0;

        foreach ($levelsConfig as $level => $levelData) {
            foreach ($levelData['indikator'] ?? [] as $indikator) {
                $nomorUrut++;

                if (!in_array($level, $levelAktif, true)) {
                    continue;
                }

                $indikatorConfig[] = [
                    'nomor' => $nomorUrut,
                    'kode' => $indikator['kode'] ?? '',
                    'pertanyaan' => $indikator['pertanyaan'] ?? '-',
                    'level' => $level,
                ];
            }
        }

        /*
        |--------------------------------------------------------------------------
        | PERBAIKAN: Perhitungan skor mengambil dari Controller (Data Arsip)
        |--------------------------------------------------------------------------
        */
        
        $totalSkorAktual = $bcksPengisian->total_skor;
        $nilaiAkhirAktual = $bcksPengisian->nilai_akhir;

        $jumlahIndikatorBerlaku = $bcksPengisian->jawaban->count();
        $skorMaksimum = $jumlahIndikatorBerlaku * 4;

        if ($skorMaksimum == 0) {
            $jumlahIndikatorBerlaku = \App\Support\BcksInstrumen::jumlahIndikator($isBcks);
            $skorMaksimum = \App\Support\BcksInstrumen::skorMaksimum($isBcks);
        }

        /*
        |--------------------------------------------------------------------------
        | Pemetaan jawaban berdasarkan nomor indikator global
        |--------------------------------------------------------------------------
        */

        $jawabanByNomor = $jawaban->keyBy(
            fn($item) => (string) $item->nomor_indikator
        );

        $jawabanByKode = $jawaban->keyBy(
            fn($item) => (string) $item->nomor_indikator
        );

        /*
        |--------------------------------------------------------------------------
        | Rekap skor per level
        |--------------------------------------------------------------------------
        */

        $levelScores = array_fill_keys(array_keys($levelConfig), 0);
        $levelCounts = array_fill_keys(array_keys($levelConfig), 0);

        foreach ($jawaban as $item) {
            $level = $item->level;

            if (array_key_exists($level, $levelScores)) {
                $levelScores[$level] += (int) $item->skor;
                $levelCounts[$level]++;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Predikat
        |--------------------------------------------------------------------------
        */

        $predikat = $bcksPengisian->predikat ?: '-';

        $predikatStyle = match ($predikat) {
            'Sangat Baik' => 'background:#d1fae5;color:#047857',
            'Baik' => 'background:#dbeafe;color:#1d4ed8',
            'Cukup' => 'background:#fef3c7;color:#b45309',
            '-' => 'background:#f1f5f9;color:#475569',
            default => 'background:#ffe4e6;color:#be123c',
        };
    ?>

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

        .b-red {
            --b-bg: linear-gradient(160deg, #fef2f2 0%, #fecaca 100%);
            --b-line: #fca5a5;
            --b-ink: #b91c1c;
            --b-glow: rgba(220, 38, 38, .7);
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

        .t-violet {
            --t-bg: linear-gradient(160deg, #f2edff 0%, #e0d6ff 100%);
            --t-line: #d6caf9;
            --t-glow: rgba(124, 58, 237, .5);
            --t-clip: #a999dc;
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

            .d-info.c3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
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

        .d-info-wide {
            grid-column: 1 / -1;
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
            .d-levels {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        .d-level {
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

        .d-empty-row {
            padding: 48px 24px;
            text-align: center;
            font-size: 13px;
            color: var(--muted);
        }
    </style>

    <div class="d-wrap">

        
        <?php if($isDataLama): ?>
            <div style="background-color: #fffbeb; border: 1px solid #fcd34d; padding: 16px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                <div>
                    <h3 style="color: #b45309; font-weight: 700; font-size: 16px; margin: 0;">Perhatian: Ini Adalah Data Lama (27 Indikator)</h3>
                    <p style="color: #92400e; font-size: 13px; margin: 4px 0 0 0;">Data ini tersimpan dalam format lama. Anda dapat melihat riwayatnya di bawah, namun untuk mengeditnya, Anda harus memperbarui formatnya ke 40 soal baru.</p>
                </div>
                <a href="<?php echo e(route('bcks.edit', $bcksPengisian)); ?>" class="d-pbtn b-red" style="box-shadow: 0 4px 6px -1px rgba(220,38,38,0.2);">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                    Perbarui Data Sekarang
                </a>
            </div>
        <?php endif; ?>

        
        <section>
            <div class="d-title-row">
                <div>
                    <h1 class="d-h1">Hasil Penilaian <b>BCKS</b></h1>
                    <p class="d-crumb">
                        Dashboard &nbsp;›&nbsp;
                        <a href="<?php echo e(route('instrumen.index')); ?>">Instrumen</a>
                        &nbsp;›&nbsp; Hasil Penilaian BCKS
                    </p>
                    <p class="d-desc">Detail hasil pengisian instrumen monitoring dan evaluasi BCKS.</p>
                </div>

                <div class="no-print d-actions">
                    <a href="<?php echo e(route('instrumen.index')); ?>" class="d-pbtn b-blue back">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
                        Kembali
                    </a>
                    <a href="<?php echo e(route('bcks.cetak', $bcksPengisian)); ?>" target="_blank" class="d-pbtn b-mint">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V3h12v6M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" /><path d="M6 14h12v7H6z" /></svg>
                        Cetak Hasil
                    </a>
                    <a href="<?php echo e(route('cetak-gabungan.index', ['pilih' => ['bcks-' . $bcksPengisian->id]])); ?>" class="d-pbtn b-violet">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3h7l5 5v9a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2z" /><path d="M16 3v5h5" /><path d="M17 21H6a2 2 0 01-2-2V9" /></svg>
                        Gabung PDF
                    </a>
                    <a href="<?php echo e(route('bcks.edit', $bcksPengisian)); ?>" class="d-pbtn b-amber">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        Edit Data
                    </a>
                </div>
            </div>
        </section>

        
        <?php if(session('success')): ?>
            <div class="d-alert">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:3px"><path d="M5 13l4 4L19 7" /></svg>
                <p><?php echo e(session('success')); ?></p>
            </div>
        <?php endif; ?>

        
        <div class="d-tiles">
            <div class="d-tile t-blue">
                <span class="d-tile-ico" style="color:var(--p-600)"><svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4" /><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" /></svg></span>
                <p class="d-tile-label">Total Skor</p>
                <p class="d-tile-val"><?php echo e($totalSkorAktual); ?><small> / <?php echo e($skorMaksimum); ?></small></p>
            </div>
            <div class="d-tile t-mint">
                <span class="d-tile-ico" style="color:#059669"><svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M19 5L5 19" /><circle cx="6.5" cy="6.5" r="2.5" /><circle cx="17.5" cy="17.5" r="2.5" /></svg></span>
                <p class="d-tile-label">Nilai Akhir</p>
                <p class="d-tile-val"><?php echo e(number_format($nilaiAkhirAktual, 2, ',', '.')); ?><small> %</small></p>
            </div>
            <div class="d-tile t-amber">
                <span class="d-tile-ico" style="color:#d99a0b"><svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6" /><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" /></svg></span>
                <p class="d-tile-label">Predikat</p>
                <div style="margin-top:8px"><span class="d-badge lg" style="<?php echo e($predikatStyle); ?>"><?php echo e($predikat); ?></span></div>
            </div>
        </div>

        
        <section class="d-card">
            <div class="d-card-top"><div><h2 class="d-card-h">Identitas Peserta & Responden</h2></div></div>
            <div class="d-info c2">
                <div><p class="d-info-label">Nama Peserta BCKS</p><p class="d-info-val"><?php echo e($bcksPengisian->nama_bcks ?: '-'); ?></p></div>
                <div><p class="d-info-label">Unit Kerja</p><p class="d-info-val"><?php echo e($bcksPengisian->unit_kerja ?: '-'); ?></p></div>
                <div><p class="d-info-label">Nama Responden</p><p class="d-info-val"><?php echo e($bcksPengisian->nama_responden ?: '-'); ?></p></div>
                <div><p class="d-info-label">Status Responden</p><p class="d-info-val"><?php echo e($statusResponden ?: '-'); ?></p></div>
            </div>
        </section>

        
        <section class="d-card">
            <div class="d-card-top"><div><h2 class="d-card-h">Rekapitulasi Berdasarkan Level</h2></div><span class="d-pill"><?php echo e(count($levelAktif)); ?> level</span></div>
            <div class="d-levels">
                <?php $__currentLoopData = $levelConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(in_array($level, $levelAktif, true)): ?>
                        <?php
                            $jumlahIndikatorLevel = $levelCounts[$level] ?? 0;
                            $skorLevel = $levelScores[$level] ?? 0;
                            $maksimalLevel = \App\Support\BcksInstrumen::levelMaksimum()[$level] ?? ($jumlahIndikatorLevel * 4);
                            $persentaseLevel = $maksimalLevel > 0 ? ($skorLevel / $maksimalLevel) * 100 : 0;
                        ?>
                        <div class="d-level">
                            <span class="d-badge" style="<?php echo e($config['badge']); ?>"><?php echo e($config['label']); ?></span>
                            <div class="d-level-row">
                                <div class="d-level-score"><?php echo e($skorLevel); ?><small> / <?php echo e($maksimalLevel); ?></small></div>
                                <span class="d-level-pct"><?php echo e(number_format($persentaseLevel, 2, ',', '.')); ?>%</span>
                            </div>
                            <div class="d-bar"><span style="width: <?php echo e(min($persentaseLevel, 100)); ?>%;background: <?php echo e($config['bar']); ?>"></span></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>

        
        <section class="d-card">
            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Detail Penilaian <?php echo e($isDataLama ? 'Histori Lama' : $jumlahIndikatorBerlaku . ' Indikator'); ?></h2>
                    <p class="d-card-s"><?php echo e($isDataLama ? 'Data jawaban lama (27 indikator).' : 'Nilai setiap indikator berdasarkan status dan hasil pengisian instrumen.'); ?></p>
                </div>
                <span class="d-pill"><?php echo e(count($jawabanSemua)); ?> indikator terisi</span>
            </div>
            <div style="overflow-x:auto">
                <table class="d-table">
                    <thead>
                        <tr><th>No</th><th>Level</th><th>Indikator</th><th class="center">Skor</th></tr>
                    </thead>
                    <tbody>
                        <?php if($isDataLama): ?>
                            <?php $__empty_1 = true; $__currentLoopData = $jawabanSemua->sortBy('nomor_indikator'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jawabanLama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="txt"><?php echo e($loop->iteration); ?></td>
                                    <td style="white-space:nowrap"><span class="d-badge" style="background:#f1f5f9;color:#475569"><?php echo e($jawabanLama->level); ?></span></td>
                                    <td class="q">Indikator No. <?php echo e($jawabanLama->nomor_indikator); ?></td>
                                    <td style="text-align:center"><span class="d-score"><?php echo e($jawabanLama->skor); ?></span></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="4" class="d-empty-row">Tidak ada detail jawaban yang tersimpan.</td></tr>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php $__empty_1 = true; $__currentLoopData = $indikatorConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indikator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $nomor = $indikator['nomor'];
                                    $kode = (string) $indikator['kode'];
                                    $jawabanItem = $jawabanByNomor->get((string) $nomor) ?? $jawabanByKode->get($kode);
                                ?>
                                <tr>
                                    <td class="txt"><?php echo e($nomor); ?></td>
                                    <td style="white-space:nowrap"><span class="d-badge" style="<?php echo e($levelConfig[$indikator['level']]['badge'] ?? 'background:#f1f5f9;color:#475569'); ?>"><?php echo e($levelConfig[$indikator['level']]['label'] ?? $indikator['level']); ?></span></td>
                                    <td class="q"><?php echo e($indikator['pertanyaan']); ?></td>
                                    <td style="text-align:center">
                                        <?php if($jawabanItem): ?><span class="d-score"><?php echo e($jawabanItem->skor); ?></span><?php else: ?><span class="faint">-</span><?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="4" class="d-empty-row">Konfigurasi indikator belum tersedia.</td></tr>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Herd\bgtk-monev\resources\views/bcks/show.blade.php ENDPATH**/ ?>