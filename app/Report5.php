<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report5 extends Model
{
    protected $table = 'report5';
    protected $fillable = ['kode','kriteria','level','no'];

    public function murid()
    {
        return $this->belongsToMany(Murid::class);
    }
}
