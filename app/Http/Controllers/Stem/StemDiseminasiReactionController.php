<?php

namespace App\Http\Controllers\Stem;

use App\Http\Controllers\Controller;
use App\Models\StemDiseminasiReaction;
use App\Support\SekolahResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StemDiseminasiReactionController extends Controller
{
    public function create()
    {
        return view('instrumen.stem.diseminasi.reaction.create');
    }

    public function store(Request $request)
    {
        $reaction = $this->simpanReaction($request);

        return redirect()->route('instrumen.stem.diseminasi.reaction.show', $reaction->id)
            ->with('success', 'Instrumen Reaction berhasil disimpan.');
    }

    public function show(StemDiseminasiReaction $reaction)
    {
        return view('instrumen.stem.diseminasi.reaction.show', compact('reaction'));
    }

    public function edit(StemDiseminasiReaction $reaction)
    {
        return view('instrumen.stem.diseminasi.reaction.edit', compact('reaction'));
    }

    public function update(Request $request, StemDiseminasiReaction $reaction)
    {
        $validated = $request->validate([
            'nama_responden'     => 'required|string|max:255',
            'asal_sekolah'       => 'required|string|max:255',
            'nama_petugas_monev' => 'required|string|max:255',
        ]);

        $rules = [];
        for ($i = 0; $i < 29; $i++) {
            $rules["reaction_skor.{$i}"] = 'required|integer|between:1,4';
        }
        $request->validate($rules, ['*.required' => 'Semua pertanyaan wajib diisi.']);

        DB::transaction(function () use ($validated, $request, $reaction) {
            $sekolah = SekolahResolver::resolve($validated['asal_sekolah']);
            $skor = $request->input('reaction_skor', []);

            $reaction->update([
                'nama_responden'     => $validated['nama_responden'],
                'asal_sekolah'       => $validated['asal_sekolah'],
                'sekolah_id'         => $sekolah?->id,
                'nama_petugas_monev' => $validated['nama_petugas_monev'],

                'evaluasi_program' => array_slice($skor, 0, 5),
                'sarana_prasarana' => array_slice($skor, 5, 5),
                'fasilitator'      => array_slice($skor, 10, 4),
                'akses_lms'        => array_slice($skor, 14, 6),
                'bahan_kegiatan'   => array_slice($skor, 20, 4),
                'jangka_waktu'     => array_slice($skor, 24, 2),
                'layanan_menu'     => array_slice($skor, 26, 3),
            ]);
        });

        return redirect()->route('instrumen.stem.diseminasi.reaction.show', $reaction->id)
            ->with('success', 'Instrumen Reaction berhasil diperbarui.');
    }

    public function cetak(StemDiseminasiReaction $reaction)
    {
        return view('instrumen.stem.diseminasi.reaction.cetak', compact('reaction'));
    }

    public function destroy(StemDiseminasiReaction $reaction)
    {
        $reaction->delete();
        return redirect()->route('instrumen.stem.diseminasi')
            ->with('success', 'Data Reaction berhasil dihapus.');
    }

    // ============================================================
    // LOGIKA SIMPAN (dipakai bersama oleh store() & publicStore())
    // ============================================================
    private function simpanReaction(Request $request): StemDiseminasiReaction
    {
        $validated = $request->validate([
            'nama_responden'     => 'required|string|max:255',
            'asal_sekolah'       => 'required|string|max:255',
            'nama_petugas_monev' => 'required|string|max:255',
        ]);

        $rules = [];
        for ($i = 0; $i < 29; $i++) {
            $rules["reaction_skor.{$i}"] = 'required|integer|between:1,4';
        }
        $request->validate($rules, ['*.required' => 'Semua pertanyaan wajib diisi.']);

        $reaction = null;

        DB::transaction(function () use ($validated, $request, &$reaction) {
            $sekolah = SekolahResolver::resolve($validated['asal_sekolah']);
            $skor = $request->input('reaction_skor', []);

            $reaction = StemDiseminasiReaction::create([
                'nama_responden'     => $validated['nama_responden'],
                'asal_sekolah'       => $validated['asal_sekolah'],
                'tanggal_pengisian'  => now(),
                'sekolah_id'         => $sekolah?->id,
                'nama_petugas_monev' => $validated['nama_petugas_monev'],

                'evaluasi_program' => array_slice($skor, 0, 5),
                'sarana_prasarana' => array_slice($skor, 5, 5),
                'fasilitator'      => array_slice($skor, 10, 4),
                'akses_lms'        => array_slice($skor, 14, 6),
                'bahan_kegiatan'   => array_slice($skor, 20, 4),
                'jangka_waktu'     => array_slice($skor, 24, 2),
                'layanan_menu'     => array_slice($skor, 26, 3),
            ]);
        });

        return $reaction;
    }

    // ============================================================
    // FORM PUBLIK (Tanpa Login)
    // ============================================================
    public function publicForm()
    {
        return view('public.reaction'); // Arahkan ke view publik
    }

    public function publicStore(Request $request)
    {
        $this->simpanReaction($request);

        return redirect()->route('public.index')
            ->with('success', 'Terima kasih! Instrumen Reaction berhasil dikirim.');
    }
}