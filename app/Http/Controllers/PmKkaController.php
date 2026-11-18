<?php

namespace App\Http\Controllers;

use App\Models\PmKkaPengisian;
use App\Support\SekolahResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PmKkaController extends Controller
{
    public function create()
    {
        return view('instrumen.pm-kka.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Identitas
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nama_sekolah' => 'required|string|max:255',
            'kelas_fase' => 'nullable|string|max:255',
            'topik_materi' => 'nullable|string|max:255',
            'nama_petugas_monev' => 'required|string|max:255',
            'jabatan_penilai' => 'required|string|max:255',
            'tanggal_monev' => 'required|date',
            'sumber_data_bukti' => 'nullable|string',
            'catatan_kekuatan' => 'nullable|string',
            'catatan_pengembangan' => 'nullable|string',
            'rekomendasi' => 'nullable|string',
            'catatan_lainnya' => 'nullable|string',
        ]);

        $pmKka = null;

        DB::transaction(function () use ($validated, $request, &$pmKka) {
            $sekolah = SekolahResolver::resolve($validated['nama_sekolah']);
            
            $pmKka = PmKkaPengisian::create([
                'sekolah_id' => $sekolah?->id,
                'nama_guru' => $validated['nama_guru'],
                'nama_sekolah' => $validated['nama_sekolah'],
                'kelas_fase' => $validated['kelas_fase'],
                'topik_materi' => $validated['topik_materi'],
                'nama_petugas_monev' => $validated['nama_petugas_monev'],
                'jabatan_penilai' => $validated['jabatan_penilai'],
                'tanggal_monev' => $validated['tanggal_monev'],
                'sumber_data_bukti' => $validated['sumber_data_bukti'],
                
                // Simpan jawaban JSON
                'level_1_jawaban' => $request->input('level_1_jawaban', []),
                'level_2_jawaban' => $request->input('level_2_jawaban', []),
                
                // Simpan catatan rekap
                'catatan_kekuatan' => $validated['catatan_kekuatan'],
                'catatan_pengembangan' => $validated['catatan_pengembangan'],
                'rekomendasi' => $validated['rekomendasi'],
                'catatan_lainnya' => $validated['catatan_lainnya'],
            ]);
        });

        return redirect()->route('pm-kka.show', $pmKka->id)
            ->with('success', 'Instrumen PM KKA berhasil disimpan.');
    }

    public function show(PmKkaPengisian $pmKka)
    {
        return view('instrumen.pm-kka.show', compact('pmKka'));
    }

    public function edit(PmKkaPengisian $pmKka)
    {
        return view('instrumen.pm-kka.edit', compact('pmKka'));
    }

    public function update(Request $request, PmKkaPengisian $pmKka)
    {
        // Validasi sama seperti store
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'nama_sekolah' => 'required|string|max:255',
            'kelas_fase' => 'nullable|string|max:255',
            'topik_materi' => 'nullable|string|max:255',
            'nama_petugas_monev' => 'required|string|max:255',
            'jabatan_penilai' => 'required|string|max:255',
            'tanggal_monev' => 'required|date',
            'sumber_data_bukti' => 'nullable|string',
            'catatan_kekuatan' => 'nullable|string',
            'catatan_pengembangan' => 'nullable|string',
            'rekomendasi' => 'nullable|string',
            'catatan_lainnya' => 'nullable|string',
        ]);

        DB::transaction(function () use ($validated, $request, $pmKka) {
            $sekolah = SekolahResolver::resolve($validated['nama_sekolah']);
            
            $pmKka->update([
                'sekolah_id' => $sekolah?->id,
                'nama_guru' => $validated['nama_guru'],
                'nama_sekolah' => $validated['nama_sekolah'],
                'kelas_fase' => $validated['kelas_fase'],
                'topik_materi' => $validated['topik_materi'],
                'nama_petugas_monev' => $validated['nama_petugas_monev'],
                'jabatan_penilai' => $validated['jabatan_penilai'],
                'tanggal_monev' => $validated['tanggal_monev'],
                'sumber_data_bukti' => $validated['sumber_data_bukti'],
                
                'level_1_jawaban' => $request->input('level_1_jawaban', []),
                'level_2_jawaban' => $request->input('level_2_jawaban', []),
                
                'catatan_kekuatan' => $validated['catatan_kekuatan'],
                'catatan_pengembangan' => $validated['catatan_pengembangan'],
                'rekomendasi' => $validated['rekomendasi'],
                'catatan_lainnya' => $validated['catatan_lainnya'],
            ]);
        });

        return redirect()->route('pm-kka.show', $pmKka->id)
            ->with('success', 'Instrumen PM KKA berhasil diperbarui.');
    }

    public function destroy(PmKkaPengisian $pmKka)
    {
        $pmKka->delete();
        return redirect()->route('instrumen.index')
            ->with('success', 'Data PM KKA berhasil dihapus.');
    }

    public function cetak(PmKkaPengisian $pmKka)
    {
        return view('instrumen.pm-kka.cetak', compact('pmKka'));
    }
}