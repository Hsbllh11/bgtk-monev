<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Menampilkan daftar sekolah.
     */
    public function index()
    {
        $sekolahs = Sekolah::latest()->paginate(10);

        $totalSekolah = Sekolah::count();

        $sudahDimonitor = Sekolah::where(
            'status_monitoring',
            'Sudah Dimonitor'
        )->count();

        $belumDimonitor = Sekolah::where(
            'status_monitoring',
            'Belum Dimonitor'
        )->count();

        $wilayah = Sekolah::distinct('kabupaten_kota')
            ->count('kabupaten_kota');

        return view('sekolah.index', compact(
            'sekolahs',
            'totalSekolah',
            'sudahDimonitor',
            'belumDimonitor',
            'wilayah'
        ));
    }

    /**
     * Menampilkan form tambah sekolah.
     */
    public function create()
    {
        return view('sekolah.create');
    }

    /**
     * Menyimpan data sekolah baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'npsn' => 'required|string|max:20|unique:sekolahs,npsn',
            'nama_sekolah' => 'required|string|max:255',
            'jenjang' => 'required|in:SD,SMP,SMA,SMK',
            'kabupaten_kota' => 'required|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'status_monitoring' => 'required|in:Sudah Dimonitor,Belum Dimonitor',
            'tahun_monitoring' => 'nullable|integer|min:2000|max:2100',
        ]);

        Sekolah::create($validated);

        return redirect()
            ->route('sekolah.index')
            ->with('success', 'Data sekolah berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail sekolah.
     */
    public function show(Sekolah $sekolah)
    {
        return view('sekolah.show', compact('sekolah'));
    }

    /**
     * Menampilkan form edit sekolah.
     */
    public function edit(Sekolah $sekolah)
    {
        return view('sekolah.edit', compact('sekolah'));
    }

    /**
     * Memperbarui data sekolah.
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        $validated = $request->validate([
            'npsn' => 'required|string|max:20|unique:sekolahs,npsn,' . $sekolah->id,
            'nama_sekolah' => 'required|string|max:255',
            'jenjang' => 'required|in:SD,SMP,SMA,SMK',
            'kabupaten_kota' => 'required|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'status_monitoring' => 'required|in:Sudah Dimonitor,Belum Dimonitor',
            'tahun_monitoring' => 'nullable|integer|min:2000|max:2100',
        ]);

        $sekolah->update($validated);

        return redirect()
            ->route('sekolah.index')
            ->with('success', 'Data sekolah berhasil diperbarui.');
    }

    /**
     * Menghapus data sekolah.
     */
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();

        return redirect()
            ->route('sekolah.index')
            ->with('success', 'Data sekolah berhasil dihapus.');
    }
}