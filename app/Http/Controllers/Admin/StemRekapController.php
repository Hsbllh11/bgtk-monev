<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StemFasdaEvaluasi;

class StemRekapController extends Controller
{
    public function evaluasiDampak()
    {
        // Ambil data evaluasi dampak terbaru beserta relasi sekolahnya
        $evaluasi = StemFasdaEvaluasi::with('sekolah')->latest('tanggal_pengisian')->paginate(15);
        
        return view('admin.stem.rekap-evaluasi', compact('evaluasi'));
    }
}