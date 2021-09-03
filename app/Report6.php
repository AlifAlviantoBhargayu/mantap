<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report6 extends Model
{
    protected $table = 'report6';
    protected $fillable = ['kode','kriteria','level','no'];

    public function murid()
    {
        return $this->belongsToMany(Murid::class);
    }
}
