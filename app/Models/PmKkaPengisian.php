<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PmKkaPengisian extends Model
{
    use HasFactory;

    protected $table = 'pm_kka_pengisians';

    protected $fillable = [
        'sekolah_id', 'nama_guru', 'nama_sekolah', 'kelas_fase', 'topik_materi',
        'nama_petugas_monev', 'jabatan_penilai', 'tanggal_monev', 'sumber_data_bukti',
        'level_1_jawaban', 'level_2_jawaban',
        'catatan_kekuatan', 'catatan_pengembangan', 'rekomendasi', 'catatan_lainnya',
    ];

    protected $casts = [
        'tanggal_monev' => 'date',
        'level_1_jawaban' => 'array',
        'level_2_jawaban' => 'array',
    ];

    public function sekolah(): BelongsTo
    {
        return $this->belongsTo(Sekolah::class);
    }
}