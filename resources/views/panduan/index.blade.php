@extends('layouts.app')

@section('title', 'Panduan Pengisian')

@section('page-title', 'Panduan Pengisian')

@section('content')

    @php
        $langkah = [
            [
                'judul' => 'Data Sekolah',
                'isi' => 'Tambahkan dan kelola data sekolah yang menjadi sasaran monitoring dan evaluasi. Pastikan NPSN, nama sekolah, jenjang, dan wilayah telah diisi dengan benar.',
            ],
            [
                'judul' => 'Instrumen Pemantauan',
                'isi' => 'Kelola instrumen yang digunakan sebagai dasar pelaksanaan monitoring dan evaluasi. Informasi instrumen meliputi kode, nama, jenis, status, jumlah pertanyaan, dan periode pelaksanaan.',
            ],
            [
                'judul' => 'Lembar Wawancara',
                'isi' => 'Catat kegiatan wawancara yang dilakukan pada sekolah. Data yang dicatat meliputi narasumber, pewawancara, tanggal wawancara, status, hasil, dan catatan.',
            ],
            [
                'judul' => 'Rencana Tindak Lanjut',
                'isi' => 'Buat tindak lanjut berdasarkan hasil monitoring maupun wawancara. Tentukan penanggung jawab, tanggal mulai, target penyelesaian, dan status pelaksanaan.',
            ],
            [
                'judul' => 'Monitoring Tindak Lanjut',
                'isi' => 'Pantau perkembangan tindak lanjut melalui status Belum Dimulai, Dalam Proses, dan Selesai. Perbarui data apabila terdapat perubahan.',
            ],
        ];

        $menu = [
            ['Dashboard', 'Menampilkan ringkasan informasi monitoring dan evaluasi.'],
            ['Instrumen Pemantauan', 'Mengelola instrumen yang digunakan dalam kegiatan monitoring.'],
            ['Lembar Wawancara', 'Mencatat dan mengelola data kegiatan wawancara.'],
            ['Rencana Tindak Lanjut', 'Mengelola rencana dan progres tindak lanjut hasil monitoring.'],
            ['Data Sekolah', 'Mengelola data sekolah yang menjadi sasaran monitoring.'],
            ['Profil Saya', 'Menampilkan informasi profil pengguna sistem.'],
        ];
    @endphp

    <style>
        /* ===================== TOKEN WARNA (sama dengan dashboard) ===================== */
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

        .d-desc {
            margin-top: 10px;
            max-width: 640px;
            font-size: 13px;
            line-height: 1.7;
            color: #475569;
        }

        /* --- kartu pengantar (gaya tile pastel) --- */
        .d-intro {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 22px 22px 22px 20px;
            overflow: hidden;
            background: linear-gradient(160deg, #eaf0ff 0%, #d3e1ff 100%);
            border: 1px solid #c6d8fb;
            border-radius: 18px;
        }

        .d-intro::before,
        .d-intro::after {
            content: '';
            position: absolute;
            z-index: 0;
            border-radius: 9999px;
            pointer-events: none;
        }

        .d-intro::before {
            right: -30px;
            bottom: -60px;
            width: 160px;
            height: 160px;
            background: rgba(255, 255, 255, .38);
        }

        .d-intro::after {
            right: 110px;
            bottom: -70px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, .24);
        }

        .d-intro-clip {
            position: absolute;
            z-index: 1;
            right: 30px;
            top: 12px;
            color: #8fa9e6;
        }

        .d-intro-dot {
            position: absolute;
            z-index: 1;
            right: 14px;
            top: 14px;
            width: 7px;
            height: 7px;
            border-radius: 9999px;
            background: var(--p-600);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .65);
        }

        .d-intro-ico {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: #fff;
            color: var(--p-600);
            box-shadow: 0 8px 18px -10px rgba(37, 99, 235, .55);
        }

        .d-intro-body {
            position: relative;
            z-index: 1;
            min-width: 0;
        }

        .d-intro-body p {
            margin-top: 6px;
            max-width: 720px;
            font-size: 13px;
            line-height: 1.8;
            color: #55637f;
        }

        /* --- alur langkah --- */
        .d-steps {
            padding: 8px 20px 22px;
        }

        .d-step {
            position: relative;
            display: flex;
            gap: 16px;
            padding: 14px 12px;
            border-radius: 14px;
            transition: background .2s;
        }

        .d-step:hover {
            background: #f7f9ff;
        }

        /* garis penghubung antar langkah */
        .d-step:not(:last-child)::after {
            content: '';
            position: absolute;
            left: 33px;
            top: 58px;
            bottom: -14px;
            width: 2px;
            border-radius: 9999px;
            background: var(--p-100);
        }

        .d-step-no {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: var(--p-600);
            color: #fff;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 10px 20px -8px rgba(37, 99, 235, .7);
        }

        .d-step h3 {
            font-size: 14px;
            font-weight: 700;
            color: var(--ink);
            letter-spacing: -.01em;
        }

        .d-step p {
            margin-top: 4px;
            max-width: 760px;
            font-size: 13px;
            line-height: 1.7;
            color: #55637f;
        }

        /* --- tabel --- */
        .d-table {
            width: 100%;
            border-collapse: collapse;
        }

        .d-table th {
            padding: 12px 20px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid var(--line);
        }

        .d-table td {
            padding: 14px 20px;
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

        .d-table .nm {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
            white-space: nowrap;
        }

        .d-table .txt {
            font-size: 12.5px;
            color: #475569;
        }

        /* --- catatan --- */
        .d-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 18px;
            border-radius: 16px;
            background: #fff8e6;
            border: 1px solid #fde7a8;
            color: #7a5200;
            font-size: 13px;
            line-height: 1.7;
        }

        .d-alert strong {
            display: block;
            font-size: 13px;
            font-weight: 700;
        }

        .d-alert-ico {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: #fff;
            color: #d99a0b;
        }
    </style>

    <div class="d-wrap">

        {{-- ================= JUDUL HALAMAN ================= --}}
        <section>
            <h1 class="d-h1">Panduan <b>Pengisian</b></h1>
            <p class="d-crumb">Dashboard &nbsp;›&nbsp; Panduan Pengisian</p>
            <p class="d-desc">Panduan penggunaan sistem Monitoring dan Evaluasi BGTK Provinsi NTB.</p>
        </section>

        {{-- ================= PENGANTAR ================= --}}
        <div class="d-intro">
            <svg class="d-intro-clip" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
            </svg>
            <span class="d-intro-dot"></span>

            <span class="d-intro-ico">
                <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>

            <div class="d-intro-body">
                <h2 class="d-card-h">Tentang Sistem Monev BGTK</h2>
                <p>
                    Sistem Monitoring dan Evaluasi BGTK Provinsi NTB digunakan untuk membantu pengelolaan data
                    monitoring, wawancara, tindak lanjut, serta informasi sekolah yang menjadi objek pemantauan
                    dan evaluasi.
                </p>
            </div>
        </div>

        {{-- ================= ALUR PENGGUNAAN ================= --}}
        <div class="d-card">

            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Alur Penggunaan Sistem</h2>
                    <p class="d-card-s">Ikuti tahapan berikut dalam melakukan monitoring dan evaluasi.</p>
                </div>

                <span class="d-pill">{{ count($langkah) }} tahap</span>
            </div>

            <div class="d-steps">
                @foreach ($langkah as $i => $item)
                    <div class="d-step">
                        <div class="d-step-no">{{ $i + 1 }}</div>

                        <div>
                            <h3>{{ $item['judul'] }}</h3>
                            <p>{{ $item['isi'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        {{-- ================= PANDUAN MENU ================= --}}
        <div class="d-card">

            <div class="d-card-top">
                <div>
                    <h2 class="d-card-h">Panduan Menu</h2>
                    <p class="d-card-s">Fungsi utama setiap menu dalam sistem.</p>
                </div>

                <span class="d-pill">{{ count($menu) }} menu</span>
            </div>

            <div style="overflow-x:auto">
                <table class="d-table">

                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Fungsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($menu as $baris)
                            <tr>
                                <td class="nm">{{ $baris[0] }}</td>
                                <td class="txt">{{ $baris[1] }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

        {{-- ================= CATATAN ================= --}}
        <div class="d-alert">
            <span class="d-alert-ico">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 9v3m0 4h.01M10.3 3.9L1.8 18a2 2 0 001.7 3h17a2 2 0 001.7-3L13.7 3.9a2 2 0 00-3.4 0z" />
                </svg>
            </span>

            <div>
                <strong>Catatan</strong>
                <p>
                    Pastikan setiap data yang dimasukkan telah diperiksa sebelum disimpan. Data yang telah tersimpan
                    dapat diperbarui melalui fitur Edit apabila terjadi perubahan.
                </p>
            </div>
        </div>

    </div>

@endsection