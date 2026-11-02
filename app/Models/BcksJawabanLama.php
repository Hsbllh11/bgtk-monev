<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BcksJawabanLama extends Model
{
    protected $table = 'bcks_jawaban_lama';
    
    public $timestamps = true;

    protected $fillable = [
        'bcks_pengisian_id',
        'nomor_indikator',
        'level',
        'skor',
        'catatan',
    ];
}