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
        // 1. Validasi Input
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'nama_pendidik' => 'required|string|max:255',
            'mata_pelajaran' => 'nullable|string|max:255',
            'tanggal_observasi' => 'required|date',
            'nama_petugas_monev' => 'required|string|max:255',

            // Bagian 1
            'skor_konteks_masalah' => 'required|integer|between:1,4',
            'bukti_konteks_masalah' => 'nullable|string',
            'skor_skenario_lkpd' => 'required|integer|between:1,4',
            'bukti_skenario_lkpd' => 'nullable|string',
            'skor_integrasi_disiplin' => 'required|integer|between:1,4',
            'bukti_integrasi_disiplin' => 'nullable|string',
            'skor_instrumen_asesmen' => 'required|integer|between:1,4',
            'bukti_instrumen_asesmen' => 'nullable|string',

            // Bagian 2
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

            // Bagian 3
            'wawancara_murid_1' => 'nullable|string',
            'wawancara_murid_2' => 'nullable|string',
            'wawancara_murid_3' => 'nullable|string',
            'wawancara_murid_4' => 'nullable|string',
            'wawancara_pendidik_1' => 'nullable|string',
            'wawancara_pendidik_2' => 'nullable|string',
            'wawancara_pendidik_3' => 'nullable|string',
            'wawancara_pendidik_4' => 'nullable|string',
        ]);

        // 2. Custom Validation: Wajib isi bukti jika skor 3 atau 4
        $skorFields = [
            'konteks_masalah', 'skenario_lkpd', 'integrasi_disiplin', 'instrumen_asesmen',
            'prinsip_5m', 'aksi_eksperimen', 'dinamika_kolaborasi', 'resiliensi', 'fungsionalitas'
        ];

        foreach ($skorFields as $field) {
            $skor = $request->input("skor_{$field}");
            $bukti = $request->input("bukti_{$field}");

            if (in_array($skor, [3, 4]) && empty(trim($bukti ?? ''))) {
                return back()->withErrors([
                    "bukti_{$field}" => "Catatan/Bukti wajib diisi jika Skor bernilai 3 atau 4."
                ])->withInput();
            }
        }

        // 3. Proses Simpan
        DB::transaction(function () use ($validated) {
            $sekolah = SekolahResolver::resolve($validated['nama_sekolah']);
            $validated['sekolah_id'] = $sekolah?->id;

            StemFasdaDampak::create($validated);
        });

        // 4. Redirect dengan pesan sukses
        return redirect()->route('instrumen.stem.fasda')
            ->with('success', 'Instrumen Dampak (Wawancara) berhasil disimpan.');
    }
}