<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muridreport extends Model
{
       protected $table = 'murid_report';
       protected $fillable = ['murid_id','report_id','level','hasil'];

    public function murid()
    {
       return $this->belongsToMany(Murid::class);
    }
}
