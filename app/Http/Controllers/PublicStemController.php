<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\StemFasdaEvaluasi;
use Illuminate\Http\Request;

class PublicStemController extends Controller
{
    // Halaman Landing Publik
    public function index()
    {
        return view('public.index');
    }

    // Halaman Form Evaluasi Dampak
    public function evaluasiCreate($token)
    {
        $invitation = Invitation::where('token', $token)->first();

        // Cek validitas token
        if (!$invitation || $invitation->is_used || $invitation->expires_at < now()) {
            return view('public.expired');
        }

        return view('public.evaluasi.create', compact('invitation'));
    }

    // Proses Simpan Evaluasi Dampak
    public function evaluasiStore(Request $request, $token)
    {
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation || $invitation->is_used || $invitation->expires_at < now()) {
            return view('public.expired');
        }

        // Validasi Identitas
        $validated = $request->validate([
            'nama_responden' => 'required|string|max:255',
            'peran_responden' => 'required|in:Pendidik,Murid',
            'asal_sekolah' => 'required|string|max:255',
            'kabupaten_kota' => 'nullable|string|max:255',
        ]);

        // Kumpulkan data untuk disimpan
        $dataToSave = [
            'nama_responden' => $validated['nama_responden'],
            'peran_responden' => $validated['peran_responden'],
            'asal_sekolah' => $validated['asal_sekolah'],
            'kabupaten_kota' => $validated['kabupaten_kota'],
            'tanggal_pengisian' => now(),
            'sekolah_id' => $invitation->sekolah_id,
        ];

        // Ambil data jawaban berdasarkan peran responden
        if ($validated['peran_responden'] === 'Pendidik') {
            $dataToSave['pendidik_perencanaan'] = $request->input('pendidik_perencanaan', []);
            $dataToSave['pendidik_pelaksanaan'] = $request->input('pendidik_pelaksanaan', []);
            $dataToSave['pendidik_evaluasi_refleksi'] = $request->input('pendidik_evaluasi_refleksi', []);
            $dataToSave['pendidik_dampak_kualitas'] = $request->input('pendidik_dampak_kualitas', []);
            $dataToSave['pendidik_pengembangan_profesional'] = $request->input('pendidik_pengembangan_profesional', []);
        } else {
            $dataToSave['murid_iklim_kelas'] = $request->input('murid_iklim_kelas', []);
            $dataToSave['murid_lingkungan_suportif'] = $request->input('murid_lingkungan_suportif', []);
            $dataToSave['murid_kebebasan_eksplorasi'] = $request->input('murid_kebebasan_eksplorasi', []);
            $dataToSave['murid_penghargaan_kolaboratif'] = $request->input('murid_penghargaan_kolaboratif', []);
            $dataToSave['murid_keingintahuan'] = $request->input('murid_keingintahuan', []);
            $dataToSave['murid_kepuasan'] = $request->input('murid_kepuasan', []);
            $dataToSave['murid_prinsip_mendalam'] = $request->input('murid_prinsip_mendalam', []);
            $dataToSave['murid_perkembangan'] = $request->input('murid_perkembangan', []);
            $dataToSave['murid_hasil_belajar'] = $request->input('murid_hasil_belajar', []);
        }

        // Simpan ke database
        StemFasdaEvaluasi::create($dataToSave);

        // Tandai token sudah dipakai agar tidak bisa diakses dua kali
        $invitation->update(['is_used' => true]);

        return view('public.success');
    }
}