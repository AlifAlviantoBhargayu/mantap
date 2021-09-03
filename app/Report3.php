<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report3 extends Model
{
    protected $table = 'report3';
    protected $fillable = ['kode','kriteria','level','no'];

    public function murid()
    {
        return $this->belongsToMany(Murid::class);
    }
}
