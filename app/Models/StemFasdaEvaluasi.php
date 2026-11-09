<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StemFasdaEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'stem_fasda_evaluasi';

    protected $fillable = [
        'sekolah_id', 'nama_responden', 'peran_responden', 'asal_sekolah', 'kabupaten_kota', 'provinsi', 'tanggal_pengisian',
        
        // Pendidik
        'pendidik_perencanaan', 'pendidik_pelaksanaan', 'pendidik_evaluasi_refleksi', 
        'pendidik_dampak_kualitas', 'pendidik_pengembangan_profesional', 'pendidik_catatan',
        
        // Murid
        'murid_iklim_kelas', 'murid_lingkungan_suportif', 'murid_kebebasan_eksplorasi',
        'murid_penghargaan_kolaboratif', 'murid_keingintahuan', 'murid_kepuasan',
        'murid_prinsip_mendalam', 'murid_perkembangan', 'murid_hasil_belajar',
    ];

    protected $casts = [
        'tanggal_pengisian' => 'date',
        'pendidik_perencanaan' => 'array',
        'pendidik_pelaksanaan' => 'array',
        'pendidik_evaluasi_refleksi' => 'array',
        'pendidik_dampak_kualitas' => 'array',
        'pendidik_pengembangan_profesional' => 'array',
        'murid_iklim_kelas' => 'array',
        'murid_lingkungan_suportif' => 'array',
        'murid_kebebasan_eksplorasi' => 'array',
        'murid_penghargaan_kolaboratif' => 'array',
        'murid_keingintahuan' => 'array',
        'murid_kepuasan' => 'array',
        'murid_prinsip_mendalam' => 'array',
        'murid_perkembangan' => 'array',
        'murid_hasil_belajar' => 'array',
    ];

    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class);
    }
}