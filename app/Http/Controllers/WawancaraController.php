<?php

namespace App\Http\Controllers;

use App\Models\Instrumen;
use App\Models\Sekolah;
use App\Models\Wawancara;
use Illuminate\Http\Request;

class WawancaraController extends Controller
{
    /**
     * Menampilkan daftar wawancara, statistik, filter, dan pencarian.
     */
    public function index(Request $request)
    {
        $query = Wawancara::with(['instrumen', 'sekolah']);

        // Filter jenis instrumen
        if ($request->filled('jenis_instrumen')) {
            $jenis = $request->jenis_instrumen;

            $query->whereHas('instrumen', function ($q) use ($jenis) {
                if ($jenis === 'BCKS') {
                    $q->where(function ($subQuery) {
                        $subQuery->where('nama_instrumen', 'like', '%BCKS%')
                            ->orWhere('kode_instrumen', 'like', '%BCKS%');
                    });
                } elseif ($jenis === 'BK') {
                    $q->where(function ($subQuery) {
                        $subQuery->where('nama_instrumen', 'like', '%BK%')
                            ->orWhere('kode_instrumen', 'like', '%BK%');
                    })->where(function ($subQuery) {
                        $subQuery->where('nama_instrumen', 'not like', '%BCKS%')
                            ->where('kode_instrumen', 'not like', '%BCKS%');
                    });
                } elseif ($jenis === 'TENDIK') {
                    $q->where(function ($subQuery) {
                        $subQuery->where('nama_instrumen', 'like', '%TENDIK%')
                            ->orWhere('kode_instrumen', 'like', '%TENDIK%');
                    });
                }
            });
        }

        // Filter status
        if ($request->filled('status')) {
            if (in_array($request->status, ['Draft', 'Dalam Proses'])) {
                $query->where('status', 'Belum Dilaksanakan');
            } elseif ($request->status === 'Final') {
                $query->where('status', 'Selesai');
            }
        }

        // Pencarian
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('nama_bcks', 'like', "%{$search}%")
                    ->orWhere('unit_kerja_bcks', 'like', "%{$search}%")
                    ->orWhere('nama_responden', 'like', "%{$search}%")
                    ->orWhere('nama_narasumber', 'like', "%{$search}%")
                    ->orWhere('jabatan_narasumber', 'like', "%{$search}%")
                    ->orWhere('nama_pewawancara', 'like', "%{$search}%")
                    ->orWhere('nama_petugas_monev', 'like', "%{$search}%")
                    ->orWhereHas('instrumen', function ($instrumenQuery) use ($search) {
                        $instrumenQuery->where('nama_instrumen', 'like', "%{$search}%")
                            ->orWhere('kode_instrumen', 'like', "%{$search}%");
                    })
                    ->orWhereHas('sekolah', function ($sekolahQuery) use ($search) {
                        $sekolahQuery->where('nama_sekolah', 'like', "%{$search}%")
                            ->orWhere('npsn', 'like', "%{$search}%");
                    });
            });
        }

        // Pagination
        $wawancaras = $query
            ->latest('tanggal_wawancara')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        // Statistik mengikuti filter yang sedang aktif
        $totalWawancara = (clone $query)->count();

        $selesai = (clone $query)
            ->where('status', 'Selesai')
            ->count();

        $belumDilaksanakan = (clone $query)
            ->where('status', 'Belum Dilaksanakan')
            ->count();

        $sekolahTerlibat = (clone $query)
            ->distinct()
            ->count('sekolah_id');

        return view('wawancara.index', compact(
            'wawancaras',
            'totalWawancara',
            'selesai',
            'belumDilaksanakan',
            'sekolahTerlibat'
        ));
    }

    /**
     * Form tambah wawancara.
     */
    public function create()
    {
        $instrumens = Instrumen::orderBy('nama_instrumen')->get();
        $sekolahs = Sekolah::orderBy('nama_sekolah')->get();

        return view('wawancara.create', compact(
            'instrumens',
            'sekolahs'
        ));
    }

    /**
     * Validasi data wawancara.
     */
    private function validasiWawancara(Request $request): array
    {
        return $request->validate([
            // Informasi wawancara
            'instrumen_id' => 'required|exists:instrumens,id',
            'sekolah_id' => 'required|exists:sekolahs,id',
            'tanggal_wawancara' => 'required|date',
            'status' => 'required|in:Belum Dilaksanakan,Selesai',

            // A. Identitas BCKS
            'nama_bcks' => 'required|string|max:255',
            'unit_kerja_bcks' => 'required|string|max:255',
            'angkatan_pelatihan_bcks' => 'required|string|max:255',

            // B. Identitas Responden
            'nama_responden' => 'required|string|max:255',
            'unit_kerja_responden' => 'required|string|max:255',
            'status_responden' => 'required|string|max:255',

            // C. Petugas Monev
            'nama_petugas_monev' => 'required|string|max:255',
            'unit_kerja_petugas' => 'required|string|max:255',

            // Kompatibilitas kolom wawancara lama
            'nama_narasumber' => 'nullable|string|max:255',
            'jabatan_narasumber' => 'nullable|string|max:255',
            'nama_pewawancara' => 'nullable|string|max:255',

            // Hasil dan catatan
            'hasil_wawancara' => 'nullable|string',
            'catatan' => 'nullable|string',

            // Lima jawaban esai
            'jawaban_1' => 'nullable|string',
            'jawaban_2' => 'nullable|string',
            'jawaban_3' => 'nullable|string',
            'jawaban_4' => 'nullable|string',
            'jawaban_5' => 'nullable|string',
        ]);
    }

    /**
     * Menyimpan wawancara baru.
     */
    public function store(Request $request)
    {
        $validated = $this->validasiWawancara($request);

        // Sinkronkan identitas baru dengan kolom lama.
        $validated['nama_narasumber'] = $validated['nama_responden'];
        $validated['nama_pewawancara'] = $validated['nama_petugas_monev'];

        if (empty($validated['jabatan_narasumber'])) {
            $validated['jabatan_narasumber'] = $validated['status_responden'];
        }

        Wawancara::create($validated);

        return redirect()
            ->route('wawancara.index')
            ->with('success', 'Data wawancara berhasil ditambahkan.');
    }

    /**
     * Detail wawancara.
     */
    public function show(Wawancara $wawancara)
    {
        $wawancara->load(['instrumen', 'sekolah']);

        return view('wawancara.show', compact('wawancara'));
    }

    /**
     * Form edit wawancara.
     */
    public function edit(Wawancara $wawancara)
    {
        $instrumens = Instrumen::orderBy('nama_instrumen')->get();
        $sekolahs = Sekolah::orderBy('nama_sekolah')->get();

        return view('wawancara.edit', compact(
            'wawancara',
            'instrumens',
            'sekolahs'
        ));
    }

    /**
     * Memperbarui wawancara.
     */
    public function update(Request $request, Wawancara $wawancara)
    {
        $validated = $this->validasiWawancara($request);

        $validated['nama_narasumber'] = $validated['nama_responden'];
        $validated['nama_pewawancara'] = $validated['nama_petugas_monev'];

        if (empty($validated['jabatan_narasumber'])) {
            $validated['jabatan_narasumber'] = $validated['status_responden'];
        }

        $wawancara->update($validated);

        return redirect()
            ->route('wawancara.index')
            ->with('success', 'Data wawancara berhasil diperbarui.');
    }

    /**
     * Menghapus wawancara.
     */
    public function destroy(Wawancara $wawancara)
    {
        $wawancara->delete();

        return redirect()
            ->route('wawancara.index')
            ->with('success', 'Data wawancara berhasil dihapus.');
    }
}
