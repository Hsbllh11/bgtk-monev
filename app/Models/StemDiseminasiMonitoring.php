<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StemDiseminasiMonitoring extends Model
{
    use HasFactory;

    protected $table = 'stem_diseminasi_monitoring';

    protected $fillable = [
        'sekolah_id', 'nama_satuan_pendidikan', 'kab_kota', 'nama_supervisor', 'jabatan_instansi', 
        'nama_fasilitator_daerah', 'tanggal_supervisi', 'tahapan_dsupervisi',
        
        'aspek_persiapan_pelaksanaan', 'aspek_elaborasi_konsep', 'aspek_refleksi_evaluasi',
        'aspek_ruang_karya', 'aspek_keterlaksanaan', 'aspek_kelengkapan_bukti',
        'aspek_desain_aktivitas', 'aspek_implementasi_stem', 'aspek_tindak_lanjut', 'aspek_dampak_awal',
        
        'wawancara_guru_1', 'wawancara_guru_2', 'wawancara_guru_3', 'wawancara_guru_4',
        'wawancara_guru_5', 'wawancara_guru_6', 'wawancara_guru_7', 'wawancara_guru_8',
    ];

    protected $casts = [
        'tanggal_supervisi' => 'date',
        'tahapan_dsupervisi' => 'array',
        'aspek_persiapan_pelaksanaan' => 'array',
        'aspek_elaborasi_konsep' => 'array',
        'aspek_refleksi_evaluasi' => 'array',
        'aspek_ruang_karya' => 'array',
        'aspek_keterlaksanaan' => 'array',
        'aspek_kelengkapan_bukti' => 'array',
        'aspek_desain_aktivitas' => 'array',
        'aspek_implementasi_stem' => 'array',
        'aspek_tindak_lanjut' => 'array',
        'aspek_dampak_awal' => 'array',
    ];

    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class);
    }
}