<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ijasah extends Model
{
    public  function murid()
    {
        return $this->belongsToMany(Murid::class);
    }
}
