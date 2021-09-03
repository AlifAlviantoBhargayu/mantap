<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bunda extends Model
{
    protected $table = 'bunda';
    protected  $fillable = ['nama','TTL','jenis_kelamin','agama','alamat','pendidikan_terakhir','whatsapp','avatar'];


 public function getAvatar()
{
    if(!$this->avatar){
        return asset('images/default.jpg');
    }
    return asset('images/'.$this->avatar);
}


    public  function murid()
    {
return $this->hasMany(Murid::class);
    }

}
