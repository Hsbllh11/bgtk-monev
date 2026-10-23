<?php

namespace App\Http\Controllers;

use App\Models\BcksPengisian;
use App\Models\BKSubmission;
use App\Models\GembiraPengisian;
use App\Models\PkgsdMbiPengisian;
use App\Models\Sekolah;
use App\Models\Tendik;
use App\Models\TindakLanjut;
use App\Models\Wawancara;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /** Warna konsisten dengan halaman Instrumen & Wawancara. */
    private const JENIS = [
        'BCKS'      => ['solid' => '#2563eb', 'soft' => '#eff6ff', 'text' => '#1d4ed8'],
        'BK'        => ['solid' => '#8b5cf6', 'soft' => '#f5f3ff', 'text' => '#6d28d9'],
        'TENDIK'    => ['solid' => '#059669', 'soft' => '#ecfdf5', 'text' => '#047857'],
        'GEMBIRA'   => ['solid' => '#d97706', 'soft' => '#fffbeb', 'text' => '#b45309'],
        'PKGSD MBI' => ['solid' => '#0891b2', 'soft' => '#ecfeff', 'text' => '#0e7490'],
    ];

    public function index()
    {
        $sekarang = now('Asia/Makassar');

        /* =====================================================
         | 1. KUMPULKAN SEMUA AKTIVITAS (INSTRUMEN + WAWANCARA)
         ===================================================== */
        $aktivitas = collect();

        $tambah = function (
            string $tipe, string $jenis, int $id, ?string $nama, ?string $petugas,
            $tanggal, $dibuat, ?float $nilai, ?int $sekolahId, string $url
        ) use (&$aktivitas) {
            $aktivitas->push([
                'tipe'       => $tipe,
                'jenis'      => $jenis,
                'id'         => $id,
                'nama'       => $nama ?: '-',
                'petugas'    => trim((string) $petugas),
                'tanggal'    => $tanggal ?: $dibuat,
                'dibuat'     => $dibuat,
                'nilai'      => $nilai,
                'sekolah_id' => $sekolahId,
                'url'        => $url,
            ]);
        };

        foreach (BcksPengisian::all() as $m) {
            $tambah('Instrumen', 'BCKS', $m->id, $m->nama_responden, $m->nama_petugas_monev,
                $m->tanggal_evaluasi, $m->created_at,
                $m->nilai_akhir !== null ? (float) $m->nilai_akhir : null,
                $m->sekolah_id, route('bcks.show', $m->id));
        }

        foreach (BKSubmission::all() as $m) {
            $tambah('Instrumen', 'BK', $m->id, $m->nama_responden, $m->nama_petugas_monev,
                $m->tanggal_pelaksanaan ?? $m->tanggal_pengisian, $m->created_at,
                $m->skor_persentase !== null ? (float) $m->skor_persentase : null,
                $m->sekolah_id, route('bk.show', $m->id));
        }

        foreach (Tendik::all() as $m) {
            $tambah('Instrumen', 'TENDIK', $m->id, $m->nama_responden, $m->nama_petugas_monev,
                $m->tanggal_pengisian, $m->created_at,
                $m->skor_keseluruhan !== null ? round(((float) $m->skor_keseluruhan / 4) * 100, 1) : null,
                $m->sekolah_id, route('tendik.show', $m->id));
        }

        foreach (GembiraPengisian::all() as $m) {
            $tambah('Instrumen', 'GEMBIRA', $m->id, $m->nama_guru, $m->nama_petugas_monev,
                $m->tanggal_monev, $m->created_at,
                $this->persenDariJson($m, 'Peserta Matematika GEMBIRA'),
                $m->sekolah_id, route('gembira.show', $m->id));
        }

        foreach (PkgsdMbiPengisian::all() as $m) {
            $tambah('Instrumen', 'PKGSD MBI', $m->id, $m->nama_guru, $m->nama_petugas_monev,
                $m->tanggal_monev, $m->created_at,
                $this->persenDariJson($m, 'Peserta PKGSD MBI'),
                $m->sekolah_id, route('pkgsd-mbi.show', $m->id));
        }

        foreach (Wawancara::all() as $m) {
            $jenis = strtoupper(trim((string) $m->jenis_wawancara));
            $tambah('Wawancara', $jenis !== '' ? $jenis : 'LAINNYA', $m->id,
                $m->nama_responden ?: $m->nama_narasumber,
                $m->nama_petugas_monev ?: $m->nama_pewawancara,
                $m->tanggal_evaluasi ?? $m->tanggal_wawancara, $m->created_at,
                null, $m->sekolah_id, route('wawancara.show', $m->id));
        }

        $instrumen = $aktivitas->where('tipe', 'Instrumen');
        $wawancara = $aktivitas->where('tipe', 'Wawancara');

        /* =====================================================
         | 2. KPI
         ===================================================== */
        $awalBulanIni  = $sekarang->copy()->startOfMonth();
        $awalBulanLalu = $awalBulanIni->copy()->subMonth();

        $hitungBulan = function ($koleksi) use ($awalBulanIni, $awalBulanLalu) {
            $ini  = $koleksi->filter(fn ($a) => $a['tanggal'] && $a['tanggal']->gte($awalBulanIni))->count();
            $lalu = $koleksi->filter(fn ($a) => $a['tanggal']
                && $a['tanggal']->gte($awalBulanLalu) && $a['tanggal']->lt($awalBulanIni))->count();

            return ['ini' => $ini, 'lalu' => $lalu];
        };

        $bulanInstrumen = $hitungBulan($instrumen);
        $bulanWawancara = $hitungBulan($wawancara);

        // Sekolah
        $totalSekolah   = Sekolah::count();
        $sudahDimonitor = Sekolah::where('status_monitoring', 'Sudah Dimonitor')->count();
        $belumDimonitor = Sekolah::where('status_monitoring', 'Belum Dimonitor')->count();

        $idSekolahAktif   = $aktivitas->pluck('sekolah_id')->filter()->unique()->values();
        $sekolahTerjangkau = $idSekolahAktif->count();

        // Sekolah yang sudah punya data monev tetapi statusnya masih "Belum Dimonitor"
        $perluDiperbarui = $idSekolahAktif->isEmpty() ? 0 : Sekolah::whereIn('id', $idSekolahAktif)
            ->where('status_monitoring', 'Belum Dimonitor')->count();

        // Tindak lanjut
        $tlTotal   = TindakLanjut::count();
        $tlSelesai = TindakLanjut::where('status', 'Selesai')->count();
        $tlProses  = TindakLanjut::where('status', 'Dalam Proses')->count();
        $tlBelum   = TindakLanjut::where('status', 'Belum Dimulai')->count();

        $tlMendesak = TindakLanjut::with('sekolah:id,nama_sekolah')
            ->where('status', '!=', 'Selesai')
            ->orderByRaw('target_selesai IS NULL')
            ->orderBy('target_selesai')
            ->take(5)
            ->get();

        $tlTerlambat = TindakLanjut::where('status', '!=', 'Selesai')
            ->whereNotNull('target_selesai')
            ->whereDate('target_selesai', '<', $sekarang->toDateString())
            ->count();

        /* =====================================================
         | 3. DATA GRAFIK
         ===================================================== */
        $kodeJenis = array_keys(self::JENIS);

        $perJenisInstrumen = array_map(
            fn ($k) => $instrumen->where('jenis', $k)->count(), $kodeJenis
        );

        $perJenisWawancara = array_map(
            fn ($k) => $wawancara->where('jenis', $k)->count(), $kodeJenis
        );

        $capaian = array_map(function ($k) use ($instrumen) {
            $nilai = $instrumen->where('jenis', $k)->pluck('nilai')->filter(fn ($n) => $n !== null);

            return $nilai->isEmpty() ? null : round($nilai->avg(), 1);
        }, $kodeJenis);

        $semuaNilai     = $instrumen->pluck('nilai')->filter(fn ($n) => $n !== null);
        $rataCapaian    = $semuaNilai->isEmpty() ? null : round($semuaNilai->avg(), 1);

        // Tren 6 bulan terakhir
        $labelBulan = $trenInstrumen = $trenWawancara = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = $sekarang->copy()->startOfMonth()->subMonths($i);
            $kunci = $bulan->format('Y-m');

            $labelBulan[]     = $bulan->locale('id')->translatedFormat('M Y');
            $trenInstrumen[]  = $instrumen->filter(fn ($a) => $a['tanggal'] && $a['tanggal']->format('Y-m') === $kunci)->count();
            $trenWawancara[]  = $wawancara->filter(fn ($a) => $a['tanggal'] && $a['tanggal']->format('Y-m') === $kunci)->count();
        }

        $chart = [
            'jenis'      => $kodeJenis,
            'warna'      => array_column(self::JENIS, 'solid'),
            'instrumen'  => $perJenisInstrumen,
            'wawancara'  => $perJenisWawancara,
            'capaian'    => $capaian,
            'bulan'      => $labelBulan,
            'trenInstrumen' => $trenInstrumen,
            'trenWawancara' => $trenWawancara,
            'tl'         => [$tlBelum, $tlProses, $tlSelesai],
            'sekolah'    => [$sudahDimonitor, $belumDimonitor],
        ];

        /* =====================================================
         | 4. AKTIVITAS TERBARU & PETUGAS TERAKTIF
         ===================================================== */
        $terbaru = $aktivitas
            ->sortByDesc(fn ($a) => optional($a['dibuat'])->timestamp ?? 0)
            ->take(8)
            ->values();

        $petugasTeraktif = $aktivitas
            ->filter(fn ($a) => $a['petugas'] !== '' && $a['petugas'] !== '-')
            ->groupBy(fn ($a) => mb_strtolower($a['petugas']))
            ->map(fn ($g) => ['nama' => $g->first()['petugas'], 'jumlah' => $g->count()])
            ->sortByDesc('jumlah')
            ->take(5)
            ->values();

        $jam   = $sekarang->hour;
        $salam = $jam < 11 ? 'Selamat pagi' : ($jam < 15 ? 'Selamat siang' : ($jam < 18 ? 'Selamat sore' : 'Selamat malam'));

        return view('dashboard.index', [
            'salam'            => $salam,
            'tanggalHariIni'   => $sekarang->locale('id')->translatedFormat('l, d F Y'),
            'jenisMeta'        => self::JENIS,

            'totalInstrumen'   => $instrumen->count(),
            'totalWawancara'   => $wawancara->count(),
            'bulanInstrumen'   => $bulanInstrumen,
            'bulanWawancara'   => $bulanWawancara,
            'rataCapaian'      => $rataCapaian,

            'totalSekolah'     => $totalSekolah,
            'sudahDimonitor'   => $sudahDimonitor,
            'belumDimonitor'   => $belumDimonitor,
            'sekolahTerjangkau'=> $sekolahTerjangkau,
            'perluDiperbarui'  => $perluDiperbarui,

            'tlTotal'          => $tlTotal,
            'tlSelesai'        => $tlSelesai,
            'tlTerlambat'      => $tlTerlambat,
            'tlMendesak'       => $tlMendesak,

            'chart'            => $chart,
            'terbaru'          => $terbaru,
            'petugasTeraktif'  => $petugasTeraktif,
        ]);
    }

    /**
     * Rata-rata skor (1–4) dari jawaban JSON, dinyatakan dalam persen.
     * Level yang dihitung mengikuti jabatan penilai; "TD" tidak dihitung.
     */
    private function persenDariJson($item, string $labelPeserta): ?float
    {
        $levelAktif = $item->jabatan_penilai === $labelPeserta ? [1, 2, 3, 4] : [3, 4];
        $total = 0;
        $jumlah = 0;

        foreach ($levelAktif as $level) {
            foreach ((array) ($item->{"level_{$level}_jawaban"} ?? []) as $jawaban) {
                $skor = is_array($jawaban) ? ($jawaban['skor'] ?? null) : $jawaban;

                if (is_numeric($skor) && (int) $skor >= 1 && (int) $skor <= 4) {
                    $total += (int) $skor;
                    $jumlah++;
                }
            }
        }

        return $jumlah > 0 ? round(($total / $jumlah / 4) * 100, 1) : null;
    }
}