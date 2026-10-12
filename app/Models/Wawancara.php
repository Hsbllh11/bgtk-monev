<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    use HasFactory;

    protected $table = 'wawancaras';

    protected $fillable = [
        // Informasi wawancara
        'instrumen_id',
        'sekolah_id',
        'tanggal_wawancara',
        'status',

        // Identitas BCKS
        'nama_bcks',
        'unit_kerja_bcks',
        'angkatan_pelatihan_bcks',

        // Identitas Responden
        'nama_responden',
        'unit_kerja_responden',
        'status_responden',

        // Petugas Monev
        'nama_petugas_monev',
        'unit_kerja_petugas',

        // Pertanyaan dan hasil wawancara
        'jawaban_1',
        'jawaban_2',
        'jawaban_3',
        'jawaban_4',
        'jawaban_5',
        'hasil_wawancara',
        'catatan',

        // Kompatibilitas dengan data wawancara lama
        'nama_narasumber',
        'jabatan_narasumber',
        'nama_pewawancara',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_wawancara' => 'date',
        ];
    }

    public function instrumen()
    {
        return $this->belongsTo(Instrumen::class);
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function tindakLanjut()
    {
        return $this->hasOne(TindakLanjut::class);
    }
}
