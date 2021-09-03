<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report7 extends Model
{
    protected $table = 'report7';
    protected $fillable = ['kode','kriteria','level','no'];

    public function murid()
    {
        return $this->belongsToMany(Murid::class);
    }
}
