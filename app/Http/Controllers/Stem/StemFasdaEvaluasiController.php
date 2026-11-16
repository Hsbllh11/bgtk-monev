<?php

namespace App\Http\Controllers\Stem;

use App\Http\Controllers\Controller;
use App\Models\StemFasdaEvaluasi;
use App\Support\SekolahResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StemFasdaEvaluasiController extends Controller
{
    public function create()
    {
        return view('instrumen.stem.fasda.evaluasi.create');
    }

    public function store(Request $request)
    {
        $evaluasi = $this->simpanEvaluasi($request);

        return redirect()->route('instrumen.stem.fasda.evaluasi.show', $evaluasi->id)
            ->with('success', 'Instrumen Evaluasi Dampak berhasil disimpan.');
    }

    public function show(StemFasdaEvaluasi $evaluasi)
    {
        return view('instrumen.stem.fasda.evaluasi.show', compact('evaluasi'));
    }

    public function edit(StemFasdaEvaluasi $evaluasi)
    {
        return view('instrumen.stem.fasda.evaluasi.edit', compact('evaluasi'));
    }

    public function update(Request $request, StemFasdaEvaluasi $evaluasi)
    {
        $validated = $request->validate([
            'nama_responden'   => 'required|string|max:255',
            'peran_responden'  => 'required|in:Pendidik,Murid',
            'asal_sekolah'     => 'required|string|max:255',
            'kabupaten_kota'   => 'nullable|string|max:255',
            'provinsi'         => 'nullable|string|max:255',
        ]);

        $rules = [];
        if ($validated['peran_responden'] === 'Pendidik') {
            for ($i = 0; $i < 22; $i++) {
                $rules["pendidik_skor.{$i}"]  = 'required|integer|between:1,4';
                $rules["pendidik_bukti.{$i}"] = 'nullable|string|max:5000';
            }
        } else {
            for ($i = 0; $i < 36; $i++) {
                $rules["murid_skor.{$i}"] = 'required|integer|between:1,4';
            }
        }
        $request->validate($rules, ['*.required' => 'Semua skor wajib diisi.']);

        DB::transaction(function () use ($validated, $request, $evaluasi) {
            $sekolah = SekolahResolver::resolve($validated['asal_sekolah']);

            $dataToSave = [
                'nama_responden'   => $validated['nama_responden'],
                'peran_responden'  => $validated['peran_responden'],
                'asal_sekolah'     => $validated['asal_sekolah'],
                'kabupaten_kota'   => $validated['kabupaten_kota'] ?? null,
                'provinsi'         => $validated['provinsi'] ?? 'Nusa Tenggara Barat',
                'sekolah_id'       => $sekolah?->id,
            ];

            if ($validated['peran_responden'] === 'Pendidik') {
                $skor  = $request->input('pendidik_skor', []);
                $bukti = $request->input('pendidik_bukti', []);

                $dataToSave['pendidik_perencanaan']              = array_slice($skor, 0, 4);
                $dataToSave['pendidik_pelaksanaan']              = array_slice($skor, 4, 5);
                $dataToSave['pendidik_evaluasi_refleksi']        = array_slice($skor, 9, 4);
                $dataToSave['pendidik_dampak_kualitas']          = array_slice($skor, 13, 5);
                $dataToSave['pendidik_pengembangan_profesional'] = array_slice($skor, 18, 4);
                $dataToSave['pendidik_catatan']                  = $bukti;
            } else {
                $skor = $request->input('murid_skor', []);

                $dataToSave['murid_iklim_kelas']             = array_slice($skor, 0, 4);
                $dataToSave['murid_lingkungan_suportif']     = array_slice($skor, 4, 4);
                $dataToSave['murid_kebebasan_eksplorasi']    = array_slice($skor, 8, 4);
                $dataToSave['murid_penghargaan_kolaboratif'] = array_slice($skor, 12, 4);
                $dataToSave['murid_keingintahuan']           = array_slice($skor, 16, 4);
                $dataToSave['murid_kepuasan']                = array_slice($skor, 20, 4);
                $dataToSave['murid_prinsip_mendalam']        = array_slice($skor, 24, 5);
                $dataToSave['murid_perkembangan']            = array_slice($skor, 29, 4);
                $dataToSave['murid_hasil_belajar']           = array_slice($skor, 33, 3);
            }

            $evaluasi->update($dataToSave);
        });

        return redirect()->route('instrumen.stem.fasda.evaluasi.show', $evaluasi->id)
            ->with('success', 'Instrumen Evaluasi Dampak berhasil diperbarui.');
    }

    public function cetak(StemFasdaEvaluasi $evaluasi)
    {
        return view('instrumen.stem.fasda.evaluasi.cetak', compact('evaluasi'));
    }

    public function destroy(StemFasdaEvaluasi $evaluasi)
    {
        $evaluasi->delete();
        return redirect()->route('instrumen.stem.fasda')
            ->with('success', 'Data Evaluasi Dampak berhasil dihapus.');
    }

    // ============================================================
    // LOGIKA SIMPAN (dipakai bersama oleh store() & publicStore())
    // ============================================================
    private function simpanEvaluasi(Request $request): StemFasdaEvaluasi
    {
        $validated = $request->validate([
            'nama_responden'   => 'required|string|max:255',
            'peran_responden'  => 'required|in:Pendidik,Murid',
            'asal_sekolah'     => 'required|string|max:255',
            'kabupaten_kota'   => 'nullable|string|max:255',
            'provinsi'         => 'nullable|string|max:255',
        ]);

        $rules = [];
        if ($validated['peran_responden'] === 'Pendidik') {
            for ($i = 0; $i < 22; $i++) {
                $rules["pendidik_skor.{$i}"]  = 'required|integer|between:1,4';
                $rules["pendidik_bukti.{$i}"] = 'nullable|string|max:5000';
            }
        } else {
            for ($i = 0; $i < 36; $i++) {
                $rules["murid_skor.{$i}"] = 'required|integer|between:1,4';
            }
        }
        $request->validate($rules, ['*.required' => 'Semua skor wajib diisi.']);

        $evaluasi = null;

        DB::transaction(function () use ($validated, $request, &$evaluasi) {
            $sekolah = SekolahResolver::resolve($validated['asal_sekolah']);

            $dataToSave = [
                'nama_responden'   => $validated['nama_responden'],
                'peran_responden'  => $validated['peran_responden'],
                'asal_sekolah'     => $validated['asal_sekolah'],
                'kabupaten_kota'   => $validated['kabupaten_kota'] ?? null,
                'provinsi'         => $validated['provinsi'] ?? 'Nusa Tenggara Barat',
                'tanggal_pengisian'=> now(),
                'sekolah_id'       => $sekolah?->id,
            ];

            if ($validated['peran_responden'] === 'Pendidik') {
                $skor  = $request->input('pendidik_skor', []);
                $bukti = $request->input('pendidik_bukti', []);

                $dataToSave['pendidik_perencanaan']              = array_slice($skor, 0, 4);
                $dataToSave['pendidik_pelaksanaan']              = array_slice($skor, 4, 5);
                $dataToSave['pendidik_evaluasi_refleksi']        = array_slice($skor, 9, 4);
                $dataToSave['pendidik_dampak_kualitas']          = array_slice($skor, 13, 5);
                $dataToSave['pendidik_pengembangan_profesional'] = array_slice($skor, 18, 4);
                $dataToSave['pendidik_catatan']                  = $bukti;
            } else {
                $skor = $request->input('murid_skor', []);

                $dataToSave['murid_iklim_kelas']             = array_slice($skor, 0, 4);
                $dataToSave['murid_lingkungan_suportif']     = array_slice($skor, 4, 4);
                $dataToSave['murid_kebebasan_eksplorasi']    = array_slice($skor, 8, 4);
                $dataToSave['murid_penghargaan_kolaboratif'] = array_slice($skor, 12, 4);
                $dataToSave['murid_keingintahuan']           = array_slice($skor, 16, 4);
                $dataToSave['murid_kepuasan']                = array_slice($skor, 20, 4);
                $dataToSave['murid_prinsip_mendalam']        = array_slice($skor, 24, 5);
                $dataToSave['murid_perkembangan']            = array_slice($skor, 29, 4);
                $dataToSave['murid_hasil_belajar']           = array_slice($skor, 33, 3);
            }

            $evaluasi = StemFasdaEvaluasi::create($dataToSave);
        });

        return $evaluasi;
    }

    // ============================================================
    // FORM PUBLIK (Tanpa Login)
    // ============================================================
    public function publicForm()
    {
        return view('public.evaluasi'); // Arahkan ke view publik
    }

    public function publicStore(Request $request)
    {
        $this->simpanEvaluasi($request);

        return redirect()->route('public.index')
            ->with('success', 'Terima kasih! Instrumen Evaluasi Dampak berhasil dikirim.');
    }
}