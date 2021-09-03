<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report2 extends Model
{
    protected $table = 'report2';
    protected $fillable = ['kode','kriteria','level','no'];

    public function murid()
    {
        return $this->belongsToMany(Murid::class);
    }
}
