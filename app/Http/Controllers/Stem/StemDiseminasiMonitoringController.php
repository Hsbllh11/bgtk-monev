<?php

namespace App\Http\Controllers\Stem;

use App\Http\Controllers\Controller;
use App\Models\StemDiseminasiMonitoring;
use App\Support\SekolahResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StemDiseminasiMonitoringController extends Controller
{
    public function create()
    {
        return view('instrumen.stem.diseminasi.monitoring.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Identitas
        $validated = $request->validate([
            'nama_satuan_pendidikan' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'nama_supervisor' => 'required|string|max:255',
            'jabatan_instansi' => 'required|string|max:255',
            'nama_fasilitator_daerah' => 'nullable|string|max:255',
            'tanggal_supervisi' => 'required|date',
        ]);

        // 2. Validasi Dinamis Skor (35 Pertanyaan)
        $rules = [];
        for ($i = 0; $i < 35; $i++) {
            $rules["monitoring_skor.{$i}"] = 'required|integer|between:1,4';
            $rules["monitoring_bukti.{$i}"] = 'nullable|string|max:5000'; // Bukti opsional
        }
        $request->validate($rules, [
            '*.required' => 'Semua skor wajib diisi.',
        ]);

        // 3. Simpan
        $monitoring = null; 
        
        DB::transaction(function () use ($validated, $request, &$monitoring) {
            $sekolah = SekolahResolver::resolve($validated['nama_satuan_pendidikan']);
            $skor = $request->input('monitoring_skor', []);
            $bukti = $request->input('monitoring_bukti', []);

            $monitoring = StemDiseminasiMonitoring::create([
                'nama_satuan_pendidikan' => $validated['nama_satuan_pendidikan'],
                'kab_kota' => $validated['kab_kota'],
                'nama_supervisor' => $validated['nama_supervisor'],
                'jabatan_instansi' => $validated['jabatan_instansi'],
                'nama_fasilitator_daerah' => $validated['nama_fasilitator_daerah'],
                'tanggal_supervisi' => $validated['tanggal_supervisi'],
                'sekolah_id' => $sekolah?->id,

                'tahapan_dsupervisi' => $request->input('tahapan_dsupervisi', []),

                // Kelompokkan skor sesuai seksi
                'aspek_persiapan_pelaksanaan' => array_slice($skor, 0, 3),
                'aspek_elaborasi_konsep' => array_slice($skor, 3, 5),
                'aspek_refleksi_evaluasi' => array_slice($skor, 8, 3),
                'aspek_ruang_karya' => array_slice($skor, 11, 4),
                'aspek_keterlaksanaan' => array_slice($skor, 15, 3),
                'aspek_kelengkapan_bukti' => array_slice($skor, 18, 3),
                'aspek_desain_aktivitas' => array_slice($skor, 21, 4),
                'aspek_implementasi_stem' => array_slice($skor, 25, 5),
                'aspek_tindak_lanjut' => array_slice($skor, 30, 4),
                'aspek_dampak_awal' => array_slice($skor, 34, 1),

                // Kelompokkan bukti sesuai seksi (BARU)
                // Disimpan sebagai JSON string, karena kolom bukti_* bertipe text
                'bukti_persiapan_pelaksanaan' => json_encode(array_slice($bukti, 0, 3)),
                'bukti_elaborasi_konsep' => json_encode(array_slice($bukti, 3, 5)),
                'bukti_refleksi_evaluasi' => json_encode(array_slice($bukti, 8, 3)),
                'bukti_ruang_karya' => json_encode(array_slice($bukti, 11, 4)),
                'bukti_keterlaksanaan' => json_encode(array_slice($bukti, 15, 3)),
                'bukti_kelengkapan_bukti' => json_encode(array_slice($bukti, 18, 3)),
                'bukti_desain_aktivitas' => json_encode(array_slice($bukti, 21, 4)),
                'bukti_implementasi_stem' => json_encode(array_slice($bukti, 25, 5)),
                'bukti_tindak_lanjut' => json_encode(array_slice($bukti, 30, 4)),
                'bukti_dampak_awal' => json_encode(array_slice($bukti, 34, 1)),

                'wawancara_guru_1' => $request->input('wawancara_guru_1'),
                'wawancara_guru_2' => $request->input('wawancara_guru_2'),
                'wawancara_guru_3' => $request->input('wawancara_guru_3'),
                'wawancara_guru_4' => $request->input('wawancara_guru_4'),
                'wawancara_guru_5' => $request->input('wawancara_guru_5'),
                'wawancara_guru_6' => $request->input('wawancara_guru_6'),
                'wawancara_guru_7' => $request->input('wawancara_guru_7'),
                'wawancara_guru_8' => $request->input('wawancara_guru_8'),
            ]);
        });

        return redirect()->route('instrumen.stem.diseminasi.monitoring.show', $monitoring->id)
            ->with('success', 'Instrumen Monitoring Diseminasi berhasil disimpan.');
    }

    public function show(StemDiseminasiMonitoring $monitoring)
    {
        return view('instrumen.stem.diseminasi.monitoring.show', compact('monitoring'));
    }

    public function edit(StemDiseminasiMonitoring $monitoring)
    {
        return view('instrumen.stem.diseminasi.monitoring.edit', compact('monitoring'));
    }

    public function update(Request $request, StemDiseminasiMonitoring $monitoring)
    {
        // 1. Validasi Identitas
        $validated = $request->validate([
            'nama_satuan_pendidikan' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'nama_supervisor' => 'required|string|max:255',
            'jabatan_instansi' => 'required|string|max:255',
            'nama_fasilitator_daerah' => 'nullable|string|max:255',
            'tanggal_supervisi' => 'required|date',
        ]);

        // 2. Validasi Dinamis Skor (35 Pertanyaan)
        $rules = [];
        for ($i = 0; $i < 35; $i++) {
            $rules["monitoring_skor.{$i}"] = 'required|integer|between:1,4';
            $rules["monitoring_bukti.{$i}"] = 'nullable|string|max:5000';
        }
        $request->validate($rules, [
            '*.required' => 'Semua skor wajib diisi.',
        ]);

        // 3. Update
        DB::transaction(function () use ($validated, $request, $monitoring) {
            $sekolah = SekolahResolver::resolve($validated['nama_satuan_pendidikan']);
            $skor = $request->input('monitoring_skor', []);
            $bukti = $request->input('monitoring_bukti', []);

            $monitoring->update([
                'nama_satuan_pendidikan' => $validated['nama_satuan_pendidikan'],
                'kab_kota' => $validated['kab_kota'],
                'nama_supervisor' => $validated['nama_supervisor'],
                'jabatan_instansi' => $validated['jabatan_instansi'],
                'nama_fasilitator_daerah' => $validated['nama_fasilitator_daerah'],
                'tanggal_supervisi' => $validated['tanggal_supervisi'],
                'sekolah_id' => $sekolah?->id,

                'tahapan_dsupervisi' => $request->input('tahapan_dsupervisi', []),

                // Kelompokkan skor sesuai seksi
                'aspek_persiapan_pelaksanaan' => array_slice($skor, 0, 3),
                'aspek_elaborasi_konsep' => array_slice($skor, 3, 5),
                'aspek_refleksi_evaluasi' => array_slice($skor, 8, 3),
                'aspek_ruang_karya' => array_slice($skor, 11, 4),
                'aspek_keterlaksanaan' => array_slice($skor, 15, 3),
                'aspek_kelengkapan_bukti' => array_slice($skor, 18, 3),
                'aspek_desain_aktivitas' => array_slice($skor, 21, 4),
                'aspek_implementasi_stem' => array_slice($skor, 25, 5),
                'aspek_tindak_lanjut' => array_slice($skor, 30, 4),
                'aspek_dampak_awal' => array_slice($skor, 34, 1),

                // Kelompokkan bukti sesuai seksi (BARU)
                'bukti_persiapan_pelaksanaan' => json_encode(array_slice($bukti, 0, 3)),
                'bukti_elaborasi_konsep' => json_encode(array_slice($bukti, 3, 5)),
                'bukti_refleksi_evaluasi' => json_encode(array_slice($bukti, 8, 3)),
                'bukti_ruang_karya' => json_encode(array_slice($bukti, 11, 4)),
                'bukti_keterlaksanaan' => json_encode(array_slice($bukti, 15, 3)),
                'bukti_kelengkapan_bukti' => json_encode(array_slice($bukti, 18, 3)),
                'bukti_desain_aktivitas' => json_encode(array_slice($bukti, 21, 4)),
                'bukti_implementasi_stem' => json_encode(array_slice($bukti, 25, 5)),
                'bukti_tindak_lanjut' => json_encode(array_slice($bukti, 30, 4)),
                'bukti_dampak_awal' => json_encode(array_slice($bukti, 34, 1)),

                'wawancara_guru_1' => $request->input('wawancara_guru_1'),
                'wawancara_guru_2' => $request->input('wawancara_guru_2'),
                'wawancara_guru_3' => $request->input('wawancara_guru_3'),
                'wawancara_guru_4' => $request->input('wawancara_guru_4'),
                'wawancara_guru_5' => $request->input('wawancara_guru_5'),
                'wawancara_guru_6' => $request->input('wawancara_guru_6'),
                'wawancara_guru_7' => $request->input('wawancara_guru_7'),
                'wawancara_guru_8' => $request->input('wawancara_guru_8'),
            ]);
        });

        return redirect()->route('instrumen.stem.diseminasi.monitoring.show', $monitoring->id)
            ->with('success', 'Instrumen Monitoring Diseminasi berhasil diperbarui.');
    }

    public function cetak(StemDiseminasiMonitoring $monitoring)
    {
        return view('instrumen.stem.diseminasi.monitoring.cetak', compact('monitoring'));
    }

    public function destroy(StemDiseminasiMonitoring $monitoring)
    {
        $monitoring->delete();
        return redirect()->route('instrumen.stem.diseminasi')
            ->with('success', 'Data Monitoring Diseminasi berhasil dihapus.');
    }
}