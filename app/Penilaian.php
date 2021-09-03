<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';
    protected $fillable = ['id_penilaian','np','nk','nq'];

    public function murid()
    {
        return $this->belongsToMany(Murid::class);
    }
}
