<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = ['user_id', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class);
    }
}

