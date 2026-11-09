<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StemDiseminasiReaction extends Model
{
    use HasFactory;

    protected $table = 'stem_diseminasi_reaction';

    protected $fillable = [
        'sekolah_id', 'nama_responden', 'asal_sekolah', 'tanggal_pengisian',
        
        'evaluasi_program', 'sarana_prasarana', 'fasilitator', 
        'akses_lms', 'bahan_kegiatan', 'jangka_waktu', 'layanan_menu',
    ];

    protected $casts = [
        'tanggal_pengisian' => 'date',
        'evaluasi_program' => 'array',
        'sarana_prasarana' => 'array',
        'fasilitator' => 'array',
        'akses_lms' => 'array',
        'bahan_kegiatan' => 'array',
        'jangka_waktu' => 'array',
        'layanan_menu' => 'array',
    ];

    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class);
    }
}