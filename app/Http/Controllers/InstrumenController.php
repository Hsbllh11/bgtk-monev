<?php

namespace App\Http\Controllers;

use App\Models\Instrumen;
use App\Models\BcksPengisian;
use App\Models\BKSubmission;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class InstrumenController extends Controller
{
    /**
     * =========================================================
     * HALAMAN UTAMA INSTRUMEN PEMANTAUAN
     * =========================================================
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | DATA MASTER INSTRUMEN
        |--------------------------------------------------------------------------
        */

        $instrumens = Instrumen::latest()
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | AMBIL RIWAYAT BCKS
        |--------------------------------------------------------------------------
        */

        $bcks = BcksPengisian::query()
            ->latest('tanggal_evaluasi')
            ->latest('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | AMBIL RIWAYAT BK
        |--------------------------------------------------------------------------
        */

        $bk = BKSubmission::query()
            ->latest('tanggal_pelaksanaan')
            ->latest('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | GABUNGKAN DATA BCKS + BK
        |--------------------------------------------------------------------------
        |
        | Kita samakan format datanya supaya bisa ditampilkan
        | dalam satu tabel Riwayat Pengisian.
        |
        */

        $riwayat = collect();


        /*
        |--------------------------------------------------------------------------
        | MASUKKAN BCKS
        |--------------------------------------------------------------------------
        */

        foreach ($bcks as $item) {

            $riwayat->push([
                'id' => $item->id,

                'jenis' => 'BCKS',

                'instrumen' => 'Monitoring & Evaluasi',

                'nama' => $item->nama_bcks,

                'unit_kerja' => $item->unit_kerja,

                'responden' => $item->nama_responden,

                'status_responden' => $item->status_responden,

                'tanggal' => $item->tanggal_evaluasi,

                'nilai' => (float) $item->nilai_akhir,

                'skor' => $item->total_skor,

                'skor_maksimal' => 108,

                'predikat' => $item->predikat,

                'status' => $item->status_pengisian,

                'show_route' => route(
                    'bcks.show',
                    [
                        'bcksPengisian' => $item->id
                    ]
                ),

                'edit_route' => route(
                    'bcks.edit',
                    [
                        'bcksPengisian' => $item->id
                    ]
                ),

                'cetak_route' => route(
                    'bcks.cetak',
                    [
                        'bcksPengisian' => $item->id
                    ]
                ),
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | MASUKKAN BK
        |--------------------------------------------------------------------------
        */

        foreach ($bk as $item) {

            $riwayat->push([
                'id' => $item->id,

                'jenis' => 'BK',

                'instrumen' => 'Monitoring & Evaluasi BK',

                /*
                |--------------------------------------------------------------------------
                | Untuk BK tidak ada field nama_bcks.
                | Kita gunakan nama responden sebagai nama utama.
                |--------------------------------------------------------------------------
                */

                'nama' => $item->nama_responden,

                'unit_kerja' => $item->instansi_responden,

                'responden' => $item->nama_responden,

                'status_responden' => $item->kab_kota,

                'tanggal' => $item->tanggal_pelaksanaan,

                'nilai' => (float) $item->skor_persentase,

                'skor' => $item->jumlah_ya,

                'skor_maksimal' => $item->jumlah_soal,

                'predikat' => $item->kategori,

                'status' => $item->status,

                'show_route' => route(
                    'bk.show',
                    [
                        'submission' => $item->id
                    ]
                ),

                'edit_route' => null,

                'cetak_route' => null,
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER JENIS INSTRUMEN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('jenis_instrumen')) {

            $jenis = $request->jenis_instrumen;

            $riwayat = $riwayat
                ->filter(
                    fn ($item) =>
                        $item['jenis'] === $jenis
                )
                ->values();
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $status = $request->status;

            $riwayat = $riwayat
                ->filter(function ($item) use ($status) {

                    if ($status === 'Draft') {

                        return $item['status'] === 'Draft';
                    }

                    if ($status === 'Dalam Proses') {

                        return $item['status'] === 'Draft';
                    }

                    if ($status === 'Final') {

                        return $item['status'] === 'Selesai';
                    }

                    return true;
                })
                ->values();
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER PENCARIAN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = strtolower(
                trim($request->search)
            );

            $riwayat = $riwayat
                ->filter(function ($item) use ($search) {

                    return
                        str_contains(
                            strtolower(
                                $item['jenis'] ?? ''
                            ),
                            $search
                        )
                        ||
                        str_contains(
                            strtolower(
                                $item['nama'] ?? ''
                            ),
                            $search
                        )
                        ||
                        str_contains(
                            strtolower(
                                $item['responden'] ?? ''
                            ),
                            $search
                        )
                        ||
                        str_contains(
                            strtolower(
                                $item['unit_kerja'] ?? ''
                            ),
                            $search
                        )
                        ||
                        str_contains(
                            strtolower(
                                $item['status_responden'] ?? ''
                            ),
                            $search
                        );
                })
                ->values();
        }


        /*
        |--------------------------------------------------------------------------
        | URUTKAN RIWAYAT TERBARU
        |--------------------------------------------------------------------------
        */

        $riwayat = $riwayat
            ->sortByDesc(function ($item) {

                if ($item['tanggal']) {
                    return $item['tanggal']->timestamp;
                }

                return 0;
            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | PAGINATION MANUAL
        |--------------------------------------------------------------------------
        |
        | Karena BCKS dan BK berasal dari dua tabel berbeda,
        | keduanya digabung dahulu kemudian dipagination.
        |
        */

        $perPage = 10;

        $currentPage = LengthAwarePaginator::resolveCurrentPage(
            'riwayat_page'
        );

        $currentItems = $riwayat
            ->slice(
                ($currentPage - 1) * $perPage,
                $perPage
            )
            ->values();

        $riwayatPengisian = new LengthAwarePaginator(
            $currentItems,
            $riwayat->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'pageName' => 'riwayat_page',
            ]
        );

        $riwayatPengisian->appends(
            $request->except('riwayat_page')
        );


        /*
        |--------------------------------------------------------------------------
        | STATISTIK MASTER INSTRUMEN
        |--------------------------------------------------------------------------
        */

        $totalInstrumen = Instrumen::count();

        $aktif = Instrumen::where(
            'status',
            'Aktif'
        )->count();

        $draft = Instrumen::where(
            'status',
            'Draft'
        )->count();

        $selesai = Instrumen::where(
            'status',
            'Selesai'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | KIRIM KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'instrumen.index',
            compact(
                'instrumens',
                'riwayatPengisian',
                'totalInstrumen',
                'aktif',
                'draft',
                'selesai'
            )
        );
    }


    /**
     * =========================================================
     * TAMBAH INSTRUMEN
     * =========================================================
     */
    public function create()
    {
        return view('instrumen.create');
    }


    /**
     * =========================================================
     * SIMPAN INSTRUMEN
     * =========================================================
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'kode_instrumen' =>
                'required|string|max:50|unique:instrumens,kode_instrumen',

            'nama_instrumen' =>
                'required|string|max:255',

            'jenis_instrumen' =>
                'required|in:Pemantauan,Evaluasi,Monitoring',

            'deskripsi' =>
                'nullable|string',

            'status' =>
                'required|in:Draft,Aktif,Selesai',

            'jumlah_pertanyaan' =>
                'required|integer|min:0',

            'capaian' =>
                'required|numeric|min:0|max:100',

            'tanggal_mulai' =>
                'nullable|date',

            'tanggal_selesai' =>
                'nullable|date|after_or_equal:tanggal_mulai',
        ]);


        Instrumen::create($validated);


        return redirect()
            ->route('instrumen.index')
            ->with(
                'success',
                'Instrumen berhasil ditambahkan.'
            );
    }


    /**
     * =========================================================
     * DETAIL INSTRUMEN
     * =========================================================
     */
    public function show(Instrumen $instrumen)
    {
        return view(
            'instrumen.show',
            compact('instrumen')
        );
    }


    /**
     * =========================================================
     * EDIT INSTRUMEN
     * =========================================================
     */
    public function edit(Instrumen $instrumen)
    {
        return view(
            'instrumen.edit',
            compact('instrumen')
        );
    }


    /**
     * =========================================================
     * UPDATE INSTRUMEN
     * =========================================================
     */
    public function update(
        Request $request,
        Instrumen $instrumen
    ) {

        $validated = $request->validate([

            'kode_instrumen' =>
                'required|string|max:50|unique:instrumens,kode_instrumen,' .
                $instrumen->id,

            'nama_instrumen' =>
                'required|string|max:255',

            'jenis_instrumen' =>
                'required|in:Pemantauan,Evaluasi,Monitoring',

            'deskripsi' =>
                'nullable|string',

            'status' =>
                'required|in:Draft,Aktif,Selesai',

            'jumlah_pertanyaan' =>
                'required|integer|min:0',

            'capaian' =>
                'required|numeric|min:0|max:100',

            'tanggal_mulai' =>
                'nullable|date',

            'tanggal_selesai' =>
                'nullable|date|after_or_equal:tanggal_mulai',
        ]);


        $instrumen->update($validated);


        return redirect()
            ->route('instrumen.index')
            ->with(
                'success',
                'Instrumen berhasil diperbarui.'
            );
    }


    /**
     * =========================================================
     * HAPUS INSTRUMEN
     * =========================================================
     */
    public function destroy(Instrumen $instrumen)
    {
        $instrumen->delete();


        return redirect()
            ->route('instrumen.index')
            ->with(
                'success',
                'Instrumen berhasil dihapus.'
            );
    }
}