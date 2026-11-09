<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StemFasdaDampak extends Model
{
    use HasFactory;

    protected $table = 'stem_fasda_dampak';

    protected $fillable = [
        'sekolah_id', 'nama_sekolah', 'nama_pendidik', 'mata_pelajaran', 'tanggal_observasi', 'nama_petugas_monev',
        
        // Bagian 1
        'skor_konteks_masalah', 'bukti_konteks_masalah',
        'skor_skenario_lkpd', 'bukti_skenario_lkpd',
        'skor_integrasi_disiplin', 'bukti_integrasi_disiplin',
        'skor_instrumen_asesmen', 'bukti_instrumen_asesmen',
        
        // Bagian 2
        'skor_prinsip_5m', 'bukti_prinsip_5m',
        'skor_aksi_eksperimen', 'bukti_aksi_eksperimen',
        'skor_dinamika_kolaborasi', 'bukti_dinamika_kolaborasi',
        'skor_resiliensi', 'bukti_resiliensi',
        'skor_fungsionalitas', 'bukti_fungsionalitas',
        
        // Bagian 3
        'wawancara_murid_1', 'wawancara_murid_2', 'wawancara_murid_3', 'wawancara_murid_4',
        'wawancara_pendidik_1', 'wawancara_pendidik_2', 'wawancara_pendidik_3', 'wawancara_pendidik_4',
    ];

    protected $casts = [
        'tanggal_observasi' => 'date',
    ];

    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class);
    }
}