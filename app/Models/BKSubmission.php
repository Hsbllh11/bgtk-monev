<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BKSubmission extends Model
{
    use HasFactory;

    protected $table = 'bk_submissions';

    protected $fillable = [
        'nama_petugas_monev',
        'instansi_petugas',
        'lokasi_monev',
        'tanggal_pelaksanaan',

        'nama_responden',
        'instansi_responden',
        'kab_kota',

        'jumlah_soal',
        'jumlah_ya',
        'jumlah_tidak',
        'skor_persentase',
        'kategori',

        'status',
    ];

    protected $casts = [
        'tanggal_pelaksanaan' => 'date',
        'skor_persentase' => 'decimal:2',
    ];

    /**
     * Daftar pertanyaan dan jawaban Ya/Tidak.
     */
    public function answers()
    {
        return $this->hasMany(BKAnswer::class, 'bk_submission_id');
    }

    /**
     * Jawaban pertanyaan uraian.
     */
    public function essayAnswers()
    {
        return $this->hasMany(BKEssayAnswer::class, 'bk_submission_id');
    }
}