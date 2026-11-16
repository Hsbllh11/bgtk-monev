<?php

namespace App\Http\Controllers\Stem;

use App\Http\Controllers\Controller;
use App\Models\StemFasdaDampak;
use App\Support\SekolahResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StemFasdaDampakController extends Controller
{
    public function create()
    {
        return view('instrumen.stem.fasda.dampak.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);
        $this->checkBukti($request);

        // Tambahkan variabel $dampak untuk menampung data yang baru dibuat
        $dampak = null;

        DB::transaction(function () use ($validated, &$dampak) {
            $sekolah = SekolahResolver::resolve($validated['nama_sekolah']);
            $validated['sekolah_id'] = $sekolah?->id;
            $dampak = StemFasdaDampak::create($validated);
        });

        // ⬅️ UBAH DISINI: Arahkan ke halaman show
        return redirect()->route('instrumen.stem.fasda.dampak.show', $dampak->id)
            ->with('success', 'Instrumen Dampak (Wawancara) berhasil disimpan.');
    }

    public function show(StemFasdaDampak $dampak)
    {
        return view('instrumen.stem.fasda.dampak.show', compact('dampak'));
    }

    public function edit(StemFasdaDampak $dampak)
    {
        return view('instrumen.stem.fasda.dampak.edit', compact('dampak'));
    }

    public function update(Request $request, StemFasdaDampak $dampak)
    {
        $validated = $this->validateData($request);
        $this->checkBukti($request);

        DB::transaction(function () use ($validated, $dampak) {
            $sekolah = SekolahResolver::resolve($validated['nama_sekolah']);
            $validated['sekolah_id'] = $sekolah?->id;
            $dampak->update($validated);
        });

        // ⬅️ UBAH DISINI: Arahkan ke halaman show
        return redirect()->route('instrumen.stem.fasda.dampak.show', $dampak->id)
            ->with('success', 'Instrumen Dampak (Wawancara) berhasil diperbarui.');
    }

    public function cetak(StemFasdaDampak $dampak)
    {
        return view('instrumen.stem.fasda.dampak.cetak', compact('dampak'));
    }

    public function destroy(StemFasdaDampak $dampak)
    {
        $dampak->delete();
        return redirect()->route('instrumen.stem.fasda')
            ->with('success', 'Data berhasil dihapus.');
    }

    private function validateData(Request $request)
    {
        return $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'nama_pendidik' => 'required|string|max:255',
            'mata_pelajaran' => 'nullable|string|max:255',
            'tanggal_observasi' => 'required|date',
            'nama_petugas_monev' => 'required|string|max:255',
            'skor_konteks_masalah' => 'required|integer|between:1,4',
            'bukti_konteks_masalah' => 'nullable|string',
            'skor_skenario_lkpd' => 'required|integer|between:1,4',
            'bukti_skenario_lkpd' => 'nullable|string',
            'skor_integrasi_disiplin' => 'required|integer|between:1,4',
            'bukti_integrasi_disiplin' => 'nullable|string',
            'skor_instrumen_asesmen' => 'required|integer|between:1,4',
            'bukti_instrumen_asesmen' => 'nullable|string',
            'skor_prinsip_5m' => 'required|integer|between:1,4',
            'bukti_prinsip_5m' => 'nullable|string',
            'skor_aksi_eksperimen' => 'required|integer|between:1,4',
            'bukti_aksi_eksperimen' => 'nullable|string',
            'skor_dinamika_kolaborasi' => 'required|integer|between:1,4',
            'bukti_dinamika_kolaborasi' => 'nullable|string',
            'skor_resiliensi' => 'required|integer|between:1,4',
            'bukti_resiliensi' => 'nullable|string',
            'skor_fungsionalitas' => 'required|integer|between:1,4',
            'bukti_fungsionalitas' => 'nullable|string',
            'wawancara_murid_1' => 'nullable|string',
            'wawancara_murid_2' => 'nullable|string',
            'wawancara_murid_3' => 'nullable|string',
            'wawancara_murid_4' => 'nullable|string',
            'wawancara_pendidik_1' => 'nullable|string',
            'wawancara_pendidik_2' => 'nullable|string',
            'wawancara_pendidik_3' => 'nullable|string',
            'wawancara_pendidik_4' => 'nullable|string',
        ]);
    }

    private function checkBukti(Request $request)
    {
        $skorFields = ['konteks_masalah', 'skenario_lkpd', 'integrasi_disiplin', 'instrumen_asesmen', 'prinsip_5m', 'aksi_eksperimen', 'dinamika_kolaborasi', 'resiliensi', 'fungsionalitas'];
        foreach ($skorFields as $field) {
            $skor = $request->input("skor_{$field}");
            $bukti = $request->input("bukti_{$field}");
            if (in_array($skor, [3, 4]) && empty(trim($bukti ?? ''))) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    "bukti_{$field}" => "Catatan/Bukti wajib diisi jika Skor bernilai 3 atau 4."
                ]);
            }
        }
    }
}