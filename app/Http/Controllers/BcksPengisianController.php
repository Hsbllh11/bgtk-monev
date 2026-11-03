<?php

namespace App\Http\Controllers;

use App\Models\BcksPengisian;
use App\Models\BcksJawaban;
use App\Models\BcksJawabanLama;
use App\Support\BcksInstrumen;
use App\Support\SekolahResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BcksPengisianController extends Controller
{
    private const STATUS_BCKS = 'BCKS';

    private const STATUS_RESPONDEN = [
        'BCKS',
        'Atasan Langsung / Pengawas Sekolah',
        'Perwakilan Guru / Tenaga Kependidikan',
    ];

    public function index()
    {
        // Gunakan eager loading
        $pengisians = BcksPengisian::with('jawaban')
            ->latest('tanggal_evaluasi')
            ->latest('id')
            ->get();

        return view('bcks.index', compact('pengisians'));
    }

    public function create()
    {
        return view('bcks.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatePengisian($request);

        $skor = $this->filterSkorBerdasarkanStatus(
            $validated['skor'],
            $validated['status_responden']
        );

        $indikator = $this->prepareIndikator($skor);
        [$totalSkor, $nilaiAkhir, $predikat] =
            $this->hitungHasil($indikator);

        $pengisian = DB::transaction(function () use (
            $request,
            $validated,
            $indikator,
            $totalSkor,
            $nilaiAkhir,
            $predikat
        ) {
            $pengisian = BcksPengisian::create([
                'sekolah_id' => SekolahResolver::resolve(
                    $validated['unit_kerja_responden'] ?? null
                )?->id,
                'nama_bcks' => $validated['nama_bcks'],
                'unit_kerja' => $validated['unit_kerja'] ?? null,
                'angkatan_pelatihan' => $validated['angkatan_pelatihan'] ?? null,
                'nama_responden' => $validated['nama_responden'],
                'unit_kerja_responden' => $validated['unit_kerja_responden'] ?? null,
                'status_responden' => $validated['status_responden'],
                'nama_petugas_monev' => $validated['nama_petugas_monev'],
                'unit_kerja_petugas' => $validated['unit_kerja_petugas'] ?? null,
                'tanggal_evaluasi' => $validated['tanggal_evaluasi'],
                'total_skor' => $totalSkor,
                'nilai_akhir' => $nilaiAkhir,
                'predikat' => $predikat,
                'status_pengisian' => 'Selesai',
            ]);

            foreach ($indikator as $item) {
                $pengisian->jawabanBaru()->create($item);
            }

            return $pengisian;
        });

        return redirect()
            ->route('bcks.show', $pengisian)
            ->with('success', 'Pengisian instrumen BCKS berhasil disimpan.');
    }

    public function show(BcksPengisian $bcksPengisian)
    {
        // 1. Ambil data mentah secara langsung tanpa melalui relasi
        $jawabanBaru = BcksJawaban::where('bcks_pengisian_id', $bcksPengisian->id)->get();
        $jawabanLama = BcksJawabanLama::where('bcks_pengisian_id', $bcksPengisian->id)->get();

        // 2. Tentukan jawaban mana yang dipakai (prioritaskan data baru)
        $jawabanAktif = $jawabanBaru->isNotEmpty() ? $jawabanBaru : $jawabanLama;

        // 3. Set relasi manual agar View bisa membacanya
        $bcksPengisian->setRelation('jawaban', $jawabanAktif);
        
        // 4. Hitung ulang skor (jika data dari arsip lama)
        $indikator = [];
        foreach ($jawabanAktif as $j) {
            $indikator[] = [
                'nomor_indikator' => $j->nomor_indikator,
                'level' => $j->level,
                'skor' => $j->skor
            ];
        }
        
        if (count($indikator) > 0) {
            [$totalSkor, $nilaiAkhir, $predikat] = $this->hitungHasil($indikator);
            $bcksPengisian->total_skor = $totalSkor;
            $bcksPengisian->nilai_akhir = $nilaiAkhir;
            $bcksPengisian->predikat = $predikat;
        }

        return view('bcks.show', compact('bcksPengisian'));
    }

    public function cetak(BcksPengisian $bcksPengisian)
    {
        // Sama seperti show(), kita paksa ambil data mentah
        $jawabanBaru = BcksJawaban::where('bcks_pengisian_id', $bcksPengisian->id)->get();
        $jawabanLama = BcksJawabanLama::where('bcks_pengisian_id', $bcksPengisian->id)->get();
        $jawabanAktif = $jawabanBaru->isNotEmpty() ? $jawabanBaru : $jawabanLama;
        
        $bcksPengisian->setRelation('jawaban', $jawabanAktif);
        
        $indikator = [];
        foreach ($jawabanAktif as $j) {
            $indikator[] = [
                'nomor_indikator' => $j->nomor_indikator,
                'level' => $j->level,
                'skor' => $j->skor
            ];
        }
        
        if (count($indikator) > 0) {
            [$totalSkor, $nilaiAkhir, $predikat] = $this->hitungHasil($indikator);
            $bcksPengisian->total_skor = $totalSkor;
            $bcksPengisian->nilai_akhir = $nilaiAkhir;
            $bcksPengisian->predikat = $predikat;
        }

        return view('bcks.cetak', compact('bcksPengisian'));
    }

    public function historiLama(BcksPengisian $bcksPengisian)
    {
        $jawabanLama = BcksJawabanLama::where('bcks_pengisian_id', $bcksPengisian->id)
            ->orderBy('nomor_indikator', 'asc')
            ->get();

        return view('bcks.histori_lama', compact('bcksPengisian', 'jawabanLama'));
    }

    public function edit(BcksPengisian $bcksPengisian)
    {
        // Paksa ambil data agar form edit bisa membaca data lama
        $jawabanBaru = BcksJawaban::where('bcks_pengisian_id', $bcksPengisian->id)->get();
        $jawabanLama = BcksJawabanLama::where('bcks_pengisian_id', $bcksPengisian->id)->get();
        $jawabanAktif = $jawabanBaru->isNotEmpty() ? $jawabanBaru : $jawabanLama;
        
        $bcksPengisian->setRelation('jawaban', $jawabanAktif);

        return view('bcks.edit', compact('bcksPengisian'));
    }

    public function update(Request $request, BcksPengisian $bcksPengisian)
    {
        $validated = $this->validatePengisian($request);

        $skor = $this->filterSkorBerdasarkanStatus(
            $validated['skor'],
            $validated['status_responden']
        );

        $indikator = $this->prepareIndikator($skor);
        [$totalSkor, $nilaiAkhir, $predikat] =
            $this->hitungHasil($indikator);

        DB::transaction(function () use (
            $validated,
            $bcksPengisian,
            $indikator,
            $totalSkor,
            $nilaiAkhir,
            $predikat
        ) {
            $bcksPengisian->update([
                'sekolah_id' => SekolahResolver::resolve(
                    $validated['unit_kerja_responden'] ?? null
                )?->id,
                'nama_bcks' => $validated['nama_bcks'],
                'unit_kerja' => $validated['unit_kerja'] ?? null,
                'angkatan_pelatihan' => $validated['angkatan_pelatihan'] ?? null,
                'nama_responden' => $validated['nama_responden'],
                'unit_kerja_responden' => $validated['unit_kerja_responden'] ?? null,
                'status_responden' => $validated['status_responden'],
                'nama_petugas_monev' => $validated['nama_petugas_monev'],
                'unit_kerja_petugas' => $validated['unit_kerja_petugas'] ?? null,
                'tanggal_evaluasi' => $validated['tanggal_evaluasi'],
                'total_skor' => $totalSkor,
                'nilai_akhir' => $nilaiAkhir,
                'predikat' => $predikat,
                'status_pengisian' => 'Selesai',
            ]);

            // Hapus jawaban lama dari kedua tabel
            BcksJawaban::where('bcks_pengisian_id', $bcksPengisian->id)->delete();
            BcksJawabanLama::where('bcks_pengisian_id', $bcksPengisian->id)->delete();

            // Simpan jawaban baru
            foreach ($indikator as $item) {
                $bcksPengisian->jawabanBaru()->create($item);
            }
        });

        return redirect()
            ->route('bcks.show', $bcksPengisian)
            ->with('success', 'Data pengisian BCKS berhasil diperbarui.');
    }

    public function destroy(BcksPengisian $bcksPengisian)
    {
        $bcksPengisian->delete();

        return redirect()
            ->route('instrumen.index')
            ->with('success', 'Data pengisian BCKS berhasil dihapus.');
    }

    private function validatePengisian(Request $request): array
    {
        $status = $request->input('status_responden');

        $rules = [
            'nama_bcks' => ['required', 'string', 'max:255'],
            'unit_kerja' => ['nullable', 'string', 'max:255'],
            'angkatan_pelatihan' => ['nullable', 'string', 'max:255'],
            'nama_responden' => ['required', 'string', 'max:255'],
            'unit_kerja_responden' => ['nullable', 'string', 'max:255'],
            'status_responden' => [
                'required',
                Rule::in(self::STATUS_RESPONDEN),
            ],
            'nama_petugas_monev' => ['required', 'string', 'max:255'],
            'unit_kerja_petugas' => ['nullable', 'string', 'max:255'],
            'tanggal_evaluasi' => ['required', 'date'],
            'skor' => ['required', 'array'],
        ];

        foreach (BcksInstrumen::jumlahPerLevelAngka() as $level => $jumlah) {
            for ($nomor = 1; $nomor <= $jumlah; $nomor++) {
                $key = "skor.{$level}_{$nomor}";

                $wajib = $status === self::STATUS_BCKS || $level >= 3;

                $rules[$key] = [
                    $wajib ? 'required' : 'nullable',
                    'integer',
                    'between:1,4',
                ];
            }
        }

        $validated = $request->validate($rules);

        $validated['skor'] = $this->filterSkorBerdasarkanStatus(
            $validated['skor'],
            $validated['status_responden']
        );

        return $validated;
    }

    private function filterSkorBerdasarkanStatus(
        array $skor,
        string $status
    ): array {
        if ($status === self::STATUS_BCKS) {
            return $skor;
        }

        return array_filter(
            $skor,
            fn ($nilai, $kode) => preg_match('/^[34]_\d+$/', (string) $kode),
            ARRAY_FILTER_USE_BOTH
        );
    }

    private function prepareIndikator(array $skor): array
    {
        $indikator = [];

        foreach ($skor as $kode => $nilai) {
            if (!preg_match('/^([1-4])_(\d+)$/', (string) $kode, $match)) {
                continue;
            }

            $level = (int) $match[1];
            $nomor = (int) $match[2];

            $nomorIndikator = BcksInstrumen::nomorGlobal($level, $nomor);
            $levelNama      = BcksInstrumen::namaLevel($level);

            if ($nomorIndikator === null || $levelNama === null) {
                continue;
            }

            $indikator[] = [
                'nomor_indikator' => $nomorIndikator,
                'level'           => $levelNama,
                'skor'            => (int) $nilai,
            ];
        }

        return $indikator;
    }

    private function hitungHasil(array $indikator): array
    {
        $totalSkor = collect($indikator)->sum('skor');
        $skorMaksimum = count($indikator) * 4;

        $nilaiAkhir = $skorMaksimum > 0
            ? round(($totalSkor / $skorMaksimum) * 100, 2)
            : 0;

        $predikat = $this->getPredikat($nilaiAkhir);

        return [$totalSkor, $nilaiAkhir, $predikat];
    }

    private function getPredikat(float $nilaiAkhir): string
    {
        return match (true) {
            $nilaiAkhir >= 85 => 'Sangat Baik',
            $nilaiAkhir >= 70 => 'Baik',
            $nilaiAkhir >= 55 => 'Cukup',
            default => 'Perlu Pembinaan',
        };
    }
}