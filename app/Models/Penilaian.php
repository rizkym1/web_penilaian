<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'tugas_id',
        'indikator_1',
        'indikator_2',
        'indikator_3',
        'indikator_4',
        'indikator_5',
        'indikator_6',
        'indikator_7',
        'skor_total',
    ];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}

