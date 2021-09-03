<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';
    protected $fillable = ['kode','kriteria','level','no'];

    public function murid()
    {
       return $this->belongsToMany(Murid::class);
    }
}
